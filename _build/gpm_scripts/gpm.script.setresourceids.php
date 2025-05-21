<?php
/**
 *
 * THIS SCRIPT IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package romanescobackyard
 * @subpackage build
 *
 * @var \xPDO\Transport\xPDOTransport $transport
 * @var array $object
 * @var array $options
 */

use MODX\Revolution\modX;
use xPDO\Transport\xPDOTransport;

return (function () {
    
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
                if (!function_exists('setResourceID')) {
                    function setResourceID($systemSetting, $contextKey, $alias, $modx)
                    {
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
                            $modx->log(xPDO::LOG_LEVEL_INFO, ' - resource ' . $resourceID . ' connected to system setting ' . $systemSetting);
                        } else {
                            $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find system setting with key: ' . $systemSetting);
                        }
                    }
                }

                if (!function_exists('setContextSetting')) {
                    function setContextSetting($contextSetting, $contextKey, $alias, $modx)
                    {
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
                            $modx->log(xPDO::LOG_LEVEL_INFO, ' - resource ' . $resourceID . ' connected to context setting ' . $contextSetting);
                        } else {
                            $modx->log(modX::LOG_LEVEL_ERROR, 'Could not find context setting with key: ' . $contextSetting);
                        }
                    }
                }

                $this->modx->log(xPDO::LOG_LEVEL_INFO, 'Setting resource IDs...');

                // Find resources and set correct IDs
                setResourceID('romanesco.footer_container_id', 'global', 'footers', $this->modx);
                setResourceID('romanesco.cta_container_id', 'global', 'call-to-actions', $this->modx);
                setResourceID('romanesco.global_backgrounds_id', 'global', 'backgrounds', $this->modx);
                setResourceID('formblocks.container_id', 'global', 'forms', $this->modx);
                setResourceID('romanesco.dashboard_id', 'hub', 'dashboard', $this->modx);
                setResourceID('romanesco.pattern_container_id', 'hub', 'patterns', $this->modx);
                setResourceID('romanesco.backyard_container_id', 'hub', 'backyard', $this->modx);

                // Set site_start for Project Hub context
                setContextSetting('site_start', 'hub', 'dashboard', $this->modx);

                $this->modx->log(xPDO::LOG_LEVEL_INFO, 'Resource IDs successfully set.');

                break;
        }

        return true;
    }
};
})()($transport->xpdo, $options[xPDOTransport::PACKAGE_ACTION]);