<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package romanescobackyard
 * @subpackage build
 *
 * @var mixed $object
 * @var modX $modx
 * @var array $options
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('romanescobackyard.core_path');

            if (empty($modelPath)) {
                $modelPath = '[[++core_path]]components/romanescobackyard/model/';
            }

            if ($modx instanceof modX) {
                $modx->addExtensionPackage('romanescobackyard', $modelPath, array (
  'serviceName' => 'romanesco',
  'serviceClass' => 'Romanesco',
));
            }

            break;
        case xPDOTransport::ACTION_UNINSTALL:
            if ($modx instanceof modX) {
                $modx->removeExtensionPackage('romanescobackyard');
            }

            break;
    }
}

return true;