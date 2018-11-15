<?php
/** @var array $options */
/** @var xPDOObject $object */
if ($object->xpdo) {

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            $corePath = $modx->getOption('romanescobackyard.core_path', null, $modx->getOption('core_path') . 'components/romanescobackyard/');

            $modx->runSnippet('jsonImportInputOptions', array(
                'file' => $corePath . 'data/options.json',
            ));

            break;
    }
}

return true;