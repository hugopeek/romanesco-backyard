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
     * @return array
     */
    public function recursiveArraySearch(array $haystack, string $needle)
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
     * Context aware retrieval of a Configuration (ClientConfig) setting.
     *
     * @param string $setting
     * @param string $contextKey
     * @param string $default
     * @return string
     */
    public function getConfigSetting(string $setting, string $contextKey = '', string $default = '')
    {
        // Get the global setting first
        $cgSetting = $this->modx->getObject('cgSetting', array('key' => $setting));

        // If ClientConfig is context aware, dig deeper for a context setting
        if (is_object($cgSetting) && $contextKey && $this->modx->getOption('clientconfig.context_aware') == true) {
            $cgContextValue = $this->modx->getObject('cgContextValue', array('setting' => $cgSetting->get('id'), 'context' => $contextKey));

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
     * Generate critical CSS for a given page.
     *
     * @param array $settings
     * @return bool
     */
    public function generateCriticalCSS(array $settings = array())
    {
        // Run parallel (by disowning the command) or in sequence
        // Take note that running multiple processes (> 10) in parallel will severely cripple your server!
        $disown = $settings['parallel'] ?? true ? ' &' : '';

        exec(
            '"$HOME/.nvm/nvm-exec" gulp critical' .
            ' --src ' . $settings['url'] .
            ' --dest ' . $this->modx->getOption('base_path') . $settings['cssPath'] . '/critical/' . rtrim($settings['uri'],'/') . '.css' .
            ' --cssPaths ' . rtrim($settings['distPath'],'/') . '/semantic.css' .
            ' --cssPaths ' . rtrim($settings['cssPath'],'/') . '/site.css' .
            ' --user ' . escapeshellcmd($this->modx->getOption('romanesco.htpasswd_user')) .
            ' --pass ' . escapeshellcmd($this->modx->getOption('romanesco.htpasswd_pass')) .
            ' --devMode ' . $this->modx->getOption('romanesco.dev_mode') .
            ' --gulpfile ' . escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.js' .
            ' >> ' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-critical.log' .
            ' 2>>' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-error.log' . $disown,
            $output,
            $return_css
        );

        $this->modx->log(modX::LOG_LEVEL_INFO, "[Romanesco] Critical CSS generated for {$settings['uri']} ({$settings['id']})");

        return true;
    }

    /**
     * Generate theme.variables file based on Presentation settings.
     *
     * @param array $settings
     * @param string $context
     * @return bool
     */
    public function generateThemeVariables(array $settings = [], string $context = '')
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
    public function generateCustomCSS(string $context = '', bool $bumpVersion = false)
    {
        // Terminate any existing gulp processes first
        $killCommand = "ps aux | grep '[g]ulp build-' | awk '{print $2}'";
        exec(
            'kill $(' . $killCommand . ') 2> /dev/null',
            $output,
            $return_kill
        );

        // Construct build command
        if ($context) {
            $distPath = $this->modx->getObject('modContextSetting', array(
                'context_key' => $context,
                'key' => 'romanesco.semantic_dist_path'
            ));
            $buildCommand = 'gulp build-context --key ' . $context . ' --dist ' . $this->modx->getOption('base_path') . $distPath->get('value');
        }
        else {
            $buildCommand = 'gulp build-css';
        }

        // Run gulp process to generate new CSS
        exec(
            '"$HOME/.nvm/nvm-exec" ' . $buildCommand .
            ' --gulpfile ' . escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-multicontext-css.js' .
            ' > ' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css.log' .
            ' 2>' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-error.log &',
            $output,
            $return_css
        );

        // Bump CSS version number to force refresh
        $versionCSS = $this->modx->getObject('modSystemSetting', array('key' => 'romanesco.assets_version_css'));
        if ($versionCSS && $bumpVersion)
        {
            // Only update minor version number (1.0.1<--)
            $versionArray = explode('.', $versionCSS->get('value'));
            $versionMinor = array_pop($versionArray);
            $versionArray[] = $versionMinor + 1;

            $versionCSS->set('value', implode('.', $versionArray));
            $versionCSS->save();
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not find romanesco.assets_version_css setting');
        }

        return true;
    }

    /**
     *
     * @param string $type
     * @return string
     */
    public function getCacheBustingString(string $type): string
    {
        if (!in_array(strtolower($type),['css','js'])) return '';

        try {
            if ($this->modx->getObject('cgSetting', array('key' => 'cache_buster'))->get('value') == 1) {
                return '.' . str_replace('.', '', $this->modx->getOption('romanesco.assets_version_' . strtolower($type)));
            }
            return '';
        }
        catch (Error $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, $e);
            return '';
        }
    }
}
