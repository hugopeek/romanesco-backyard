<?php
/** @var array $options */
/** @var xPDOObject $object */
if ($object->xpdo) {

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            $options = file_get_contents('../data/options.json');

            $modx->runSnippet('jsonImportInputOptions', array(
                $file => $options,
            ));

            break;
    }
}

return true;