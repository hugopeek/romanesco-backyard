<?php
/**
 * Romanesco task runner
 *
 * @package romanescobackyard
 * @var modX $modx
 * @var Romanesco $romanesco
 */

use FractalFarming\Romanesco\Romanesco;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

ob_end_flush();
ini_set("output_buffering", "0");
ob_implicit_flush(true);
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('X-Accel-Buffering: no');

$task = $_GET['task'];
$context = $_GET['context'];
//$schedule = $_GET['schedule'];
$taskName = '';
$taskCmd = [];

function echoEvent($datatext): bool
{
    $datatext = preg_replace('/\e[[][A-Za-z0-9];?[0-9]*m?/', '', $datatext);
    $datatext = preg_replace('/\[(.+)] /', '', $datatext);

    // Output (for some reason it needs a double \n at the end to work)
    if ($datatext) {
        echo "data: " . $datatext . PHP_EOL . PHP_EOL;
    }

    // Write data to log file too
    $logFile = MODX_BASE_PATH . 'core/cache/logs/run.log';
    file_put_contents($logFile, $datatext . PHP_EOL, FILE_APPEND);

    // Push data out
    ob_end_flush();
    flush();

    // Break the loop if the client aborted the connection (closed the page)
    if ( connection_aborted() ) return false;

    //sleep(1);
    return true;
}

if (!$context) {
    echoEvent("No valid context was given!");
    echoEvent("Process aborted.");
    return false;
}

// Get settings from ClientConfig
$corePath = $modx->getOption('clientconfig.core_path', null, $modx->getOption('core_path') . 'components/clientconfig/');
$clientConfig = $modx->getService('clientconfig','ClientConfig', $corePath . 'model/clientconfig/', array('core_path' => $corePath));
$settings = $clientConfig->getSettings($context);

// Use Romanesco for processing config settings
$corePath = $modx->getOption('romanescobackyard.core_path', null, $modx->getOption('core_path') . 'components/romanescobackyard/');
$romanesco = $modx->getService('romanesco','Romanesco',$corePath . 'model/romanescobackyard/', array('core_path' => $corePath));

echoEvent("[" . date("Y-m-d G:i:s") . "]");
echoEvent("Updating theme variables...");

if (!$romanesco->generateThemeVariables($settings, $context)) {
    echoEvent("Theme variables could not be generated!");
    echoEvent("Process aborted.");
    return false;
}

echoEvent("Theme variables successfully updated.");

// Retrieve dist path
$distPath = $modx->getObject('modContextSetting', array(
    'context_key' => $context,
    'key' => 'romanesco.semantic_dist_path'
));

if (!$distPath) {
    echoEvent("romanesco.semantic_dist_path setting not found!");
    echoEvent("Process aborted.");
    return false;
}

// Set tasks
if ($task == 'css') {
    $taskName = 'Generate CSS';
    $taskCmd = [
        'gulp', 'build-context',
        '--gulpfile', $modx->getOption('assets_path') . 'components/romanescobackyard/js/gulp/generate-multicontext-css.js',
        '--key', $context,
        '--task', 'css',
        '--dist', $modx->getOption('base_path') . $distPath->get('value'),
   ];
}

if ($task == 'favicons') {
    $taskName = 'Generate favicons';
    $faviconPath = $modx->getObject('modContextSetting', array(
        'context_key' => $context,
        'key' => 'romanesco.favicon_path'
    ));

    if (!$settings['logo_badge_path']) {
        echoEvent("Please provide a badge icon under Configuration if you want to generate favicons!");
        echoEvent("Process aborted.");
        return false;
    }

    if ($faviconPath) {
        $taskCmd = [
            'gulp', 'generate-favicon',
            '--gulpfile', $modx->getOption('assets_path') . 'components/romanescobackyard/js/gulp/generate-favicons.js',
            '--name', $modx->getOption('site_name'),
            '--root', $modx->getOption('base_path'),
            '--rel', $faviconPath->get('value'),
            '--img', $modx->getOption('base_path') . $settings['logo_badge_path'],
            '--primary', $settings['theme_color_primary'],
            '--secondary', $settings['theme_color_secondary'],
        ];
    } else {
        echoEvent("romanesco.favicon_path setting not found!");
        echoEvent("Process aborted.");
        return false;
    }
}

//  Run task with Symfony Process
if ($taskCmd) {
    $process = new Process($taskCmd);
    $process->start();

    echoEvent("$taskName for context $context...");

    // While command is running...
    foreach ($process as $type => $data) {
        echoEvent($data);
    }

    // After command is finished
    if (!$process->isSuccessful()) {
        $error = new ProcessFailedException($process);
        echoEvent($error);
        echoEvent("Process aborted.");
        return false;
    }

    echoEvent("All done!");
}

// Generate critical CSS via utility snippet
if ($task == 'criticals') {
    $globalTemplates = "-0,-8,-9,-10,-11,-19,-20,-27";
    $excludedTemplates = $modx->runSnippet('beforeEach', [
        'input' => $settings['critical_excluded_templates'],
        'before' => '-',
        'separator' => ','
    ]);

    $resources = $modx->runSnippet('pdoMenu', [
        'context' => $context,
        'parents' => '0',
        'level' => '3',
        'limit' => '0',
        'tplOuter' => '@INLINE [[+wrapper]]',
        'tpl' => '@INLINE [[+id]],[[+wrapper]]',
        'showHidden' => '1',
        'showUnpublished' => '0',
        'templates' => "$globalTemplates,$excludedTemplates",
    ]);

    $resources = explode(',', $resources);
    $output = '';

    foreach ($resources as $id) {
        $output = $modx->runSnippet('generateCriticalCSS', [
            'id' => $id,
        ]);
        echoEvent($output);
    }

    echoEvent('All done!');
}

return true;