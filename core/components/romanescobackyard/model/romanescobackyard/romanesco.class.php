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
     * @param array $array
     * @param string $needle
     * @return mixed
     */
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

    /**
     * Get correct custom CSS path for a resource, based on its context.
     * This path is relative to the project root.
     *
     * @param string $contextKey
     * @return string
     */
    public function getCssPath($contextKey) {
        $cssPathSystem = $this->modx->getObject('modSystemSetting', array(
            'key' => 'romanesco.custom_css_path'
        ));
        $cssPathContext = $this->modx->getObject('modContextSetting', array(
            'context_key' => $contextKey,
            'key' => 'romanesco.custom_css_path'
        ));

        if ($cssPathContext) {
            $cssPath = $cssPathContext->get('value');
        } else if ($cssPathSystem) {
            $cssPath = $cssPathSystem->get('value');
        } else {
            $cssPath = 'assets/css';
        }

        return $cssPath;
    }

    /**
     * Generate critical CSS for a given page.
     *
     * @param int $resourceID
     * @param string $resourceURI
     * @param string $cssPath
     * @return true
     */
    public function generateCriticalCSS($resourceID,$resourceURI,$cssPath) {
        $buildCommand = 'gulp critical --src ' . $this->modx->makeUrl($resourceID,'','','full') . ' --dist ' . $this->modx->getOption('base_path') . $cssPath . '/critical/' . rtrim($resourceURI,'/') . '.css';

        exec(
            '"$HOME/.nvm/nvm-exec" ' . $buildCommand .
            ' --gulpfile ' . escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.js' .
            ' >> ' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-critical.log' .
            ' 2>>' . escapeshellcmd($this->modx->getOption('core_path')) . 'cache/logs/css-error.log &',
            $output,
            $return_css
        );

        $this->modx->log(modX::LOG_LEVEL_INFO, "Critical CSS generated for $resourceURI ($resourceID)");

        return true;
    }
}
