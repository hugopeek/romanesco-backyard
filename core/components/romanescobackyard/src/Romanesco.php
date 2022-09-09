<?php
/**
 * @package romanescobackyard
 * @subpackage classfile
 */

namespace FractalFarming\Romanesco;

use modX;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use DateTime;
use Error;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use CssLint\Linter;

//use rmCrossLink;
//use rmExternalLink;
//use rmOption;
//use rmOptionGroup;
//use rmSocialConnect;
//use rmSocialShare;
//use rmTask;
//use rmTaskComment;

class Romanesco
{
    /**
     * A reference to the modX instance
     * @var modX $modx
     */
    public modX $modx;

    /**
     * The namespace
     * @var string $namespace
     */
    public $namespace = 'romanescobackyard';

    /**
     * The class options
     * @var array $options
     */
    public $options = [];

    /**
     * Romanesco constructor
     *
     * @param modX $modx A reference to the modX instance.
     * @param array $options An array of configuration options. Optional.
     */
    function __construct(modX &$modx, array $options = [])
    {
        $this->modx =& $modx;
        $this->namespace = $this->getOption('namespace', $options, $this->namespace);

        $corePath = $this->getOption($this->namespace. '.core_path', $options, $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/' . $this->namespace . '/');
        $assetsPath = $this->getOption($this->namespace . '.assets_path', $options, $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH) . 'components/' . $this->namespace . '/');
        $assetsUrl = $this->getOption($this->namespace . '.assets_url', $options, $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/' . $this->namespace . '/');

        $this->options = array_merge([
            'namespace' => $this->namespace,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'vendorPath' => $corePath . 'vendor/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'pagesPath' => $corePath . 'elements/pages/',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'pluginsPath' => $corePath . 'elements/plugins/',
            'controllersPath' => $corePath . 'controllers/',
            'processorsPath' => $corePath . 'processors/',
            'templatesPath' => $corePath . 'templates/',
            'cachePath' => $this->modx->getOption('core_path') . 'cache/',
            'assetsPath' => $assetsPath,
            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'imagesUrl' => $assetsUrl . 'img/',
            'connectorUrl' => $assetsUrl . 'connector.php'
        ], $options);

        $this->modx->addPackage($this->namespace, $this->getOption('modelPath'));
        $lexicon = $this->modx->getService('lexicon', 'modLexicon');
        $lexicon->load($this->namespace . ':default');
    }

    /**
     * Get a local configuration option or a namespaced system setting by key.
     *
     * @param string $key The option key to search for.
     * @param array $options An array of options that override local options.
     * @param mixed $default The default value returned if the option is not found locally or as a
     * namespaced system setting; by default this value is null.
     * @return mixed The option value or the default value specified.
     */
    public function getOption($key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->options)) {
                $option = $this->options[$key];
            } elseif (array_key_exists("$this->namespace.$key", $this->modx->config)) {
                $option = $this->modx->getOption("$this->namespace.$key");
            }
        }
        return $option;
    }

    /**
     * Look for a key in a multidimensional array.
     *
     * @param array $haystack
     * @param string $needle
     * @return array
     */
    public function recursiveArraySearch(array $haystack, string $needle): array
    {
        $result = [];
        $iterator  = new RecursiveArrayIterator($haystack);
        $recursive = new RecursiveIteratorIterator(
            $iterator,
            RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($recursive as $key => $value) {
            if ($key === $needle) {
                $result[] = $value;
            }
        }
        return $result;
        //yield $result;
    }

    /**
     * Custom context settings are not always picked up by chunks and snippets
     * because (unlike native MODX settings) they are not automatically
     * initialized.
     *
     * This function mimics the default MODX behaviour: it checks the context
     * settings first and falls back on the system setting if nothing was found.
     *
     * @param string $setting
     * @param string $contextKey
     * @param string $default
     * @return string
     */
    public function getContextSetting(string $setting, string $contextKey, string $default = ''): string
    {
        $contextSetting = $this->modx->getObject('modContextSetting', [
            'context_key' => $contextKey,
            'key' => $setting
        ]);

        if ($contextSetting) {
            return $contextSetting->get('value');
        }

        $systemSetting = $this->modx->getObject('modSystemSetting', [
            'key' => $setting
        ]);

        if ($systemSetting) {
            return $systemSetting->get('value');
        }

        return $default;
    }

    /**
     * Context aware retrieval of a Configuration (ClientConfig) setting.
     *
     * @param string $setting
     * @param string $contextKey
     * @param string $default
     * @return string
     */
    public function getConfigSetting(string $setting, string $contextKey = '', string $default = ''): string
    {
        // Get the global setting first
        $cgSetting = $this->modx->getObject('cgSetting', ['key' => $setting]);

        // If ClientConfig is context aware, dig deeper for a context setting
        if (is_object($cgSetting) && $contextKey && $this->modx->getOption('clientconfig.context_aware')) {
            $cgContextValue = $this->modx->getObject('cgContextValue', ['setting' => $cgSetting->get('id'), 'context' => $contextKey]);

            if (is_object($cgContextValue)) {
                return $cgContextValue->get('value');
            } else {
                return $cgSetting->get('value');
            }
        }

        // Contexts are disabled, return global setting
        if (is_object($cgSetting)) {
            return $cgSetting->get('value');
        }

        // We're in trouble now...
        $this->modx->log(modX::LOG_LEVEL_ERROR, "[Romanesco] Setting $setting not found!");

        return $default;
    }

    /**
     * Generate theme.variables file based on Presentation settings.
     *
     * @param array $settings
     * @param string $context
     * @return bool
     */
    public function generateThemeVariables(array $settings = [], string $context = ''): bool
    {
        // Set theme.variables path for current context
        $themesFolder = $this->modx->getOption('base_path') . 'assets/semantic/src/themes/';
        if ($context) {
            $themeVariablesPath = $themesFolder . $context . '/globals/theme.variables';
        } else {
            $themeVariablesPath = $themesFolder . 'project/globals/theme.variables';
        }

        // Write to theme.variables
        $pathInfo = pathinfo($themeVariablesPath);
        $path = $pathInfo['dirname'];
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        file_put_contents(
            $themeVariablesPath,
            $this->modx->getChunk('themeVariables', $settings)
        );

        return true;
    }

    /**
     * Generate CSS for given context.
     *
     * @param string $context
     * @param bool $bumpVersion
     * @return bool
     */
    public function generateCustomCSS(string $context = '', bool $bumpVersion = false): bool
    {
        // Construct build command
        $gulpFile = escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-multicontext-css.js';

        if ($context) {
            $distPath = $this->modx->getObject('modContextSetting', [
                'context_key' => $context,
                'key' => 'romanesco.semantic_dist_path'
            ]);
            $cmd = [
                'gulp', 'build-context',
                '--gulpfile', $gulpFile,
                '--key', $context,
                '--dist', $this->modx->getOption('base_path') . $distPath->get('value')
            ];
        }
        else {
            $cmd = [
                'gulp', 'build-css',
                '--gulpfile', $gulpFile,
            ];
        }

        // Start Symfony process
        $this->runCommand($cmd, 'css.log');

        // Bump CSS version number to force refresh
        if ($bumpVersion) {
            $this->bumpVersionNumber();
        }

        return true;
    }

    /**
     * Generate critical CSS for a given page.
     *
     * @param array $settings
     * @return bool
     */
    public function generateCriticalCSS(array $settings = []): bool
    {
        $cmd = [
            'gulp', 'critical',
            '--src', $settings['url'],
            '--dest', $this->modx->getOption('base_path') . $settings['cssPath'] . '/critical/' . rtrim($settings['uri'],'/') . '.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/semantic.css',
            '--cssPaths', rtrim($settings['cssPath'],'/') . '/site.css',
            '--user', escapeshellarg($this->modx->getOption('romanesco.htpasswd_user')),
            '--pass', escapeshellarg($this->modx->getOption('romanesco.htpasswd_pass')),
            '--devMode', $this->modx->getOption('romanesco.dev_mode'),
            '--gulpfile', escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.js'
        ];

        // Start Symfony process
        $this->runCommand($cmd, 'critical.log');

        return true;
    }

    /**
     * Generate static CSS file with global backgrounds.
     *
     * A generic site.css will be created in the default location, containing
     * the backgrounds in the Global Backgrounds container. If there are child
     * containers present under this resource, a separate file will be generated
     * for this context in a sub folder.
     *
     * @return bool
     */
    public function generateBackgroundCSS(): bool
    {
        // Get all background containers
        $bgContainers = $this->modx->getCollection('modResource', array(
            'parent' => $this->modx->getOption('romanesco.global_backgrounds_id'),
            'template' => 8
        ));

        // Get chunk with CSS template
        if ($this->modx->getObject('modChunk', array('name' => 'cssTheme'))) {
            $cssChunk = 'cssTheme';
        } else {
            $cssChunk = 'css';
        }

        // Get default CSS path
        $cssPathSystem = $this->modx->getOption('romanesco.custom_css_path');
        if ($cssPathSystem) {
            $cssPathDefault = $this->modx->getOption('base_path') . $cssPathSystem;
        } else {
            $cssPathDefault = $this->modx->getOption('base_path') . 'assets/css';
        }

        // Set file content and path
        $css = $this->modx->getChunk($cssChunk);
        $staticFile = $cssPathDefault . '/site.css';

        // Validate all CSS
        $cssLinter = new Linter();
        if ($cssLinter->lintString($css) !== true) {
            $msg = "CSS is not valid and will not be generated at $staticFile:";
            $errors = implode("\n", $cssLinter->getErrors());
            $this->modx->log(modX::LOG_LEVEL_ERROR, "$msg\n$errors");
            return true;
        }

        // Generate CSS file
        if (!$this->modx->cacheManager->writeFile($staticFile, $css)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Error writing CSS to static file {$staticFile}", '', __FUNCTION__, __FILE__, __LINE__);
        }

        // Start collecting CSS paths for minification down the road
        $minifyCSS[] = $cssPathDefault;

        // Each container represents a context
        foreach ($bgContainers as $container) {
            $context = $container->get('alias');

            // Find correct file path for this context
            $cssPathContext = $this->modx->getObject('modContextSetting', array(
                'context_key' => $context,
                'key' => 'romanesco.custom_css_path'
            ));
            if ($cssPathContext) {
                $cssPath = $this->modx->getOption('base_path') . $cssPathContext->get('value');
            } else {
                $cssPath = $cssPathDefault . '/' . $context;
            }

            // Prepare CSS for this context
            $css = $this->modx->getChunk($cssChunk, array(
                'context' => $context,
            ));
            $staticFile = $cssPath . '/site.css';

            // Validate CSS
            if ($cssLinter->lintString($css) !== true) {
                $msg = "CSS is not valid and will not be generated at $staticFile:";
                $errors = implode("\n", $cssLinter->getErrors());
                $this->modx->log(modX::LOG_LEVEL_ERROR, "$msg\n$errors");
                continue;
            }

            // Generate CSS file
            if (!$this->modx->cacheManager->writeFile($staticFile, $css)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, "Error writing CSS to static file {$staticFile}", '', __FUNCTION__, __FILE__, __LINE__);
            }

            // Sign up for minification
            $minifyCSS[] = $cssPath;
        }

        // Minify CSS (run as snippet, so it can be scheduled)
        foreach ($minifyCSS as $path) {
            $this->modx->runSnippet('minifyCSS', ['css_path' => $path]);
        }

        return true;
    }

    /**
     * Minify given CSS file with Gulp.
     *
     * @param string $path
     * @return bool
     */
    public function minifyCSS(string $path): bool
    {
        $cmd = [
            'gulp', 'minify-css',
            '--path', $path,
            '--gulpfile', escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/minify-css.js'
        ];

        // Start Symfony process
        $this->runCommand($cmd);

        return true;
    }

    /**
     * Generate favicons for given context.
     *
     * @param array $settings
     * @return bool
     */
    public function generateFavicons(array $settings = []): bool
    {
        $path = $this->modx->getOption('base_path') . $settings['logo_badge_path'];

        $cmd = [
            'gulp', 'generate-favicon',
            '--gulpfile', escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-favicons.js',
            '--name', escapeshellarg($this->modx->getOption('site_name')),
            '--img', escapeshellarg($path),
            '--primary', escapeshellarg($settings['theme_color_primary']),
            '--secondary', escapeshellarg($settings['theme_color_secondary'])
        ];

        // Start Symfony process
        $this->runCommand($cmd, 'favicon.log');

        // Bump favicon version number to force refresh
        $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.favicon_version']);
        if ($version) {
            $version->set('value', $version->get('value') + 0.1);
            $version->save();
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not find favicon_version setting');
        }

        return true;
    }

    /**
     * Bump semantic version number to force refresh in browser.
     *
     * @param string $type Asset type can be either CSS or JS. Defaults to CSS.
     * @return void
     */
    public function bumpVersionNumber(string $type = 'CSS') : void
    {
        switch ($type) {
            case 'JS':
                $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.assets_version_js']);
                break;
            default:
                $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.assets_version_css']);
        }

        if (is_object($version))
        {
            // Only update minor version number (1.0.1<--)
            $versionArray = explode('.', $version->get('value'));
            $versionMinor = array_pop($versionArray);
            $versionArray[] = $versionMinor + 1;

            $version->set('value', implode('.', $versionArray));
            $version->save();
        } else {
            $setting = 'romanesco.assets_version_'. strtolower($type);
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Could not find $setting setting");
        }
    }

    /**
     * Inject version number into assets path, to force browsers to refresh their cache.
     *
     * @param string $type
     * @return string
     */
    public function getCacheBustingString(string $type): string
    {
        if (!in_array(strtolower($type),['css','js'])) return '';

        try {
            if ($this->modx->getObject('cgSetting', ['key' => 'cache_buster'])->get('value') == 1) {
                return '.' . str_replace('.', '', $this->modx->getOption('romanesco.assets_version_' . strtolower($type)));
            }
            return '';
        }
        catch (Error $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, $e);
            return '';
        }
    }

    /**
     * Run command outside MODX with Symfony Process
     *
     * @param array $cmd Format the command as an array, with each argument as a separate value.
     * @param string|null $logFile Write standard output to log file (optional). Errors will always be written to error log.
     * @return void
     */
    public function runCommand(array $cmd, string $logFile = null): void
    {
        // Set working directory and shell PATH
        $process = new Process($cmd, MODX_BASE_PATH, [
            'PATH' => escapeshellarg($this->modx->getOption('romanesco.shell_path'))
        ]);

        // Start process
        $process->run();

        // After command is finished
        if (!$process->isSuccessful()) {
            $error = new ProcessFailedException($process);
            $this->modx->log(modX::LOG_LEVEL_ERROR, "\n" . $error);
            return;
        }

        // Log standard output to file or error log
        $output = $process->getOutput();

        if ($logFile) {
            $logFile = MODX_CORE_PATH . 'cache/logs/' . $logFile;
            $date = new DateTime();
            $date = $date->format("Y-m-d H:i:s");
            file_put_contents($logFile, "[$date] $output", FILE_APPEND);
        } else {
            $this->modx->log(modX::LOG_LEVEL_INFO, "\n" . $output);
        }
    }
}
