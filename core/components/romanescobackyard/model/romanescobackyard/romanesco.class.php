<?php
/**
 * @property modX modx
 * @package romanesco
 */

class Romanesco
{
    public $config = array();

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

    // Look for a key in a multidimensional array
    public function recursiveArraySearch(array $array, $needle) {
        $result = array();
        $iterator  = new RecursiveArrayIterator($array);
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

    // Generate critical CSS for a given page
    public function generateCriticalCSS($resource) {
        $cssPathSystem = $this->modx->getObject('modSystemSetting', array(
            'key' => 'romanesco.custom_css_path'
        ));
        $cssPathContext = $this->modx->getObject('modContextSetting', array(
            'context_key' => $resource->get('context_key'),
            'key' => 'romanesco.custom_css_path'
        ));

        if ($cssPathContext) {
            $cssPath = $this->modx->getOption('base_path') . $cssPathContext->get('value');
        } else if ($cssPathSystem) {
            $cssPath = $this->modx->getOption('base_path') . $cssPathSystem->get('value');
        } else {
            $cssPath = $this->modx->getOption('base_path') . 'assets/css';
        }

        $buildCommand = 'gulp critical --src ' . $this->modx->makeUrl($resource->get('id'),'','','full') . ' --dist ' . $cssPath . '/critical/' . rtrim($resource->get('uri'),'/') . '.css';

        exec(
            '"$HOME/.nvm/nvm-exec" ' . $buildCommand .
            ' --gulpfile ' . escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.js' .
            ' >> ' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-critical.log' .
            ' 2>>' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-error.log &',
            $output,
            $return_css
        );

        $this->modx->log(modX::LOG_LEVEL_INFO, "Critical CSS generated for {$resource->get('uri')} ({$resource->get('id')})");

        return true;
    }
}
