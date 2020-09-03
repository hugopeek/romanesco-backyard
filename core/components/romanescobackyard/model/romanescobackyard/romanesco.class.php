<?php
/**
 * @property modX modx
 * @package romanesco
 */

class Romanesco
{
    /**
     * A configuration array
     * @var array $config
     */
    public $config = array();

    /**
     * Romanesco constructor
     *
     * @param modX $modx A reference to the modX instance.
     * @param array $config An array of configuration options. Optional.
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;
        $corePath = $this->modx->getOption('romanescobackyard.core_path', $config, $this->modx->getOption('core_path') . 'components/romanescobackyard/');
        $this->config = array_merge(array(
            'basePath' => $this->modx->getOption('base_path'),
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
        ), $config);
        $this->modx->addPackage('romanescobackyard', $this->config['modelPath']);
    }

    /**
     * Look for a key in a multidimensional array.
     *
     * @param array $haystack
     * @param string $needle
     * @return mixed
     */
    public function recursiveArraySearch(array $haystack, $needle)
    {
        $result = array();
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
    public function getContextSetting(string $setting, string $contextKey, string $default = '')
    {
        $contextSetting = $this->modx->getObject('modContextSetting', array(
            'context_key' => $contextKey,
            'key' => $setting
        ));

        if ($contextSetting) {
            return $contextSetting->get('value');
        }

        $systemSetting = $this->modx->getObject('modSystemSetting', array(
            'key' => $setting
        ));

        if ($systemSetting) {
            return $systemSetting->get('value');
        }

        return $default;
    }

    /**
     * Generate critical CSS for a given page.
     *
     * @param array $settings
     * @return true
     */
    public function generateCriticalCSS(array $settings = array())
    {
        // Run parallel (by disowning the command) or in sequence
        // Take note that running multiple processes (> 10) in parallel will severely cripple your server!
        $disown = $settings['parallel'] ?? true ? ' &' : '';

        exec(
            '"$HOME/.nvm/nvm-exec" gulp critical' .
            ' --src ' . $this->modx->makeUrl($settings['id'],'','','full') .
            ' --dest ' . $this->modx->getOption('base_path') . $settings['cssPath'] . '/critical/' . rtrim($settings['uri'],'/') . '.css' .
            ' --cssPaths ' . rtrim($settings['distPath'],'/') . '/semantic.css' .
            ' --cssPaths ' . rtrim($settings['cssPath'],'/') . '/site.css' .
            ' --devMode ' . $this->modx->getOption('romanesco.dev_mode') .
            ' --gulpfile ' . escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.js' .
            ' >> ' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-critical.log' .
            ' 2>>' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-error.log' . $disown,
            $output,
            $return_css
        );

        $this->modx->log(modX::LOG_LEVEL_ERROR, "Critical CSS generated for {$settings['uri']} ({$settings['id']})");

        return true;
    }
}
