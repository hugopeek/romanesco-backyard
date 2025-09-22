<?php

use MODX\Revolution\modX;
use xPDO\Transport\xPDOTransport;

return new class() {
    /**
     * @var modX
     */
    private $modx;

    /**
     * @var int
     */
    private $action;

    /**
     * @param modX $modx
     * @param int $action
     * @return bool
     */
    public function __invoke(&$modx, $action)
    {
        $this->modx =& $modx;
        $this->action = $action;

        switch ($this->action) {
            case xPDOTransport::ACTION_INSTALL:
            case xPDOTransport::ACTION_UPGRADE:
                $corePath = $this->modx->getOption('romanescobackyard.core_path', null, $this->modx->getOption('core_path') . 'components/romanescobackyard/');

                $modx->runSnippet('jsonImportInputOptions', array(
                    'file' => $corePath . 'data/options.json',
                    'updateExisting' => false,
                ));

                break;
        }

        return true;
    }
};