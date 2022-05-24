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
            $modelPath = $modx->getOption('romanescobackyard.core_path', null, $modx->getOption('core_path') . 'components/romanescobackyard/') . 'model/';
            
            $modx->addPackage('romanescobackyard', $modelPath, null);


            $manager = $modx->getManager();

            $manager->createObjectContainer('rmTask');
            $manager->createObjectContainer('rmCrossLink');
            $manager->createObjectContainer('rmExternalLink');
            $manager->createObjectContainer('rmSocialConnect');
            $manager->createObjectContainer('rmSocialShare');
            $manager->createObjectContainer('rmOption');
            $manager->createObjectContainer('rmOptionGroup');

            break;
    }
}

return true;