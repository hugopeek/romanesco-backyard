<?php
/** @var array $options */
/** @var xPDOObject $object */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            $assetsPath = $modx->getOption('romanescobackyard.assets_path',null,$modx->getOption('assets_path') . 'components/romanescobackyard/');

            if (is_dir($assetsPath)) {
                copy($assetsPath . 'resourcemap.php', $modx->getOption('base_path') . '_backup/resourcemap_' . time() . '.php.bak');

                $modx->log(xPDO::LOG_LEVEL_INFO, '[Romanesco] Resource map successfully backed up.');

            } else {
                $modx->log(xPDO::LOG_LEVEL_ERROR, '[Romanesco] Could not backup resource map!');
            }

            break;
    }
}

return true;