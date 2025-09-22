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
use Composer\Console\HtmlOutputFormatter;
use Composer\Factory;
use Composer\Installer;
use Composer\IO\BufferIO;
use Symfony\Component\Console\Output\StreamOutput;

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
                $success = true;

                $this->modx->log(modX::LOG_LEVEL_INFO, 'Installing/updating dependencies, this may take some time...');

                $path = MODX_CORE_PATH . "components/romanescobackyard/";

                // Set Composer environment variables
                putenv("COMPOSER={$path}composer.json");
                putenv("COMPOSER_HOME={$path}.composer");
                putenv("COMPOSER_VENDOR_DIR={$path}vendor/");

                // Change the path to the package namespace folder, to prevent autoloading other namespaces
                chdir($path);

                require "phar://{$path}composer.phar/vendor/autoload.php";

                // Run Composer without proc_open/exec
                $io = new BufferIO('', StreamOutput::VERBOSITY_NORMAL, new HtmlOutputFormatter());
                $composer = Factory::create($io);
                $install = Installer::create($io, $composer);
                $install
                    ->setPreferDist(true)
                    ->setDevMode(false)
                    ->setOptimizeAutoloader(true)
                    ->setUpdate(false)
                    ->setPreferStable(true);

                try {
                    $install->run();
                } catch (Exception $e) {
                    $this->modx->log(modX::LOG_LEVEL_ERROR, get_class($e) . ' installing dependencies: ' . $e->getMessage());
                    echo get_class($e) . ': ' . $e->getMessage() . "\n";
                    $success = false;
                }

                $output = $io->getOutput();
                $output = nl2br(trim($output));
                $this->modx->log(modX::LOG_LEVEL_INFO, $output);
                break;
        }

        return $success;
    }
};
})()($transport->xpdo, $options[xPDOTransport::PACKAGE_ACTION]);