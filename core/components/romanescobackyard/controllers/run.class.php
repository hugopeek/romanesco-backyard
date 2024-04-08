<?php
/**
 * Romanesco task runner
 *
 * @package romanescobackyard
 */

class romanescoRunManagerController extends modParsedManagerController
{
    public function getPageTitle() {
        return 'Task runner';
    }

    public function initialize() {
        parent::initialize();

        $assetsUrl = $this->modx->getOption('assets_url') . 'components/romanesco/';
        $scriptProperties = [
            'connector_url' => $assetsUrl . 'connector.php?action=run'
        ];

        $this->modx->regClientStartupScript($this->modx->getChunk('rmRunTaskJS', $scriptProperties), true);
        $this->modx->regClientCSS($this->modx->getOption('assets_url') . 'components/romanescobackyard/css/semantic.css');
        $this->modx->regClientCSS($assetsUrl . 'css/operations.css');
    }

    public function checkPermissions() {
        return true;
    }

    public function process(array $scriptProperties = []) {
        return '[[!$rmRunTaskCMP]]';
    }
}