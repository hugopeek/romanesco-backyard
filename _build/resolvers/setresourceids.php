<?php
/** @var array $options */
/** @var xPDOObject $object */
if ($object->xpdo) {

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            //$corePath = $modx->getOption('romanescobackyard.core_path', null, $modx->getOption('core_path') . 'components/romanescobackyard/');
            //$assetsPath = $modx->getOption('assets_path');

            if (!function_exists('setResourceID')) {
                function setResourceID($systemSetting, $contextKey, $alias, $modx)
                {
                    //global $modx;

                    // Get the resource
                    $query = $modx->newQuery('modResource');
                    $query->where(array(
                        'context_key' => $contextKey,
                        'alias' => $alias,
                    ));
                    $query->select('id');
                    $resourceID = $modx->getValue($query->prepare());

                    if (!$resourceID) {
                        $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find resource ID for: ' . $alias);
                        return;
                    }

                    // Update system setting
                    $setting = $modx->getObject('modSystemSetting', array('key' => $systemSetting));

                    if ($setting) {
                        $setting->set('value', $resourceID);
                        $setting->save();
                    } else {
                        $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find system setting with key: ' . $systemSetting);
                    }

                    return;
                }
            }

            if (!function_exists('setContextSetting')) {
                function setContextSetting($contextSetting, $contextKey, $alias, $modx)
                {
                    //global $modx;

                    // Get the resource
                    $query = $modx->newQuery('modResource');
                    $query->where(array(
                        'context_key' => $contextKey,
                        'alias' => $alias,
                    ));
                    $query->select('id');
                    $resourceID = $modx->getValue($query->prepare());

                    if (!$resourceID) {
                        $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find resource ID for: ' . $alias);
                        return;
                    }

                    // Update context setting
                    $setting = $modx->getObject('modContextSetting', array(
                        'context_key' => $contextKey,
                        'key' => $contextSetting
                    ));

                    if ($setting) {
                        $setting->set('value', $resourceID);
                        $setting->save();
                    } else {
                        $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find context setting with key: ' . $contextSetting);
                    }

                    return;
                }
            }

            // Find resources and set correct IDs
            setResourceID('romanesco.cta_container_id', 'global','call-to-actions', $modx);
            setResourceID('romanesco.global_backgrounds_id', 'global','backgrounds', $modx);
            setResourceID('formblocks.container_id', 'global','forms', $modx);
            setResourceID('romanesco.dashboard_id', 'hub','dashboard', $modx);
            setResourceID('romanesco.pattern_container_id', 'hub','patterns', $modx);
            setResourceID('romanesco.backyard_container_id', 'hub','backyard', $modx);

            // Set site_start for Project Hub context
            setContextSetting('site_start', 'hub','dashboard', $modx);

            $modx->log(xPDO::LOG_LEVEL_INFO, 'Resource IDs successfully set.');

            break;
    }
}

return true;