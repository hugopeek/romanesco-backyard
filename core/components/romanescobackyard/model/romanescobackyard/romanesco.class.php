<?php
/**
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
}
