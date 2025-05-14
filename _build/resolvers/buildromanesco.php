<?php
/**
 * Build Romanesco
 *
 * Entrance of another silly rabbit hole, for letting the package installer run
 * Gitify to build the Romanesco elements. These elements can't be packaged
 * directly, because that would cause too many ID conflicts in too many places.
 *
 * @var array $options
 * @var xPDOObject $object
 */

use FractalFarming\Romanesco\Romanesco;

if ($object->xpdo)
{
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;
            $corePath = $modx->getOption('romanescobackyard.core_path', null, $modx->getOption('core_path') . 'components/romanescobackyard/');
            $romanesco = $modx->getService('romanesco','Romanesco',$corePath . 'model/romanescobackyard/',array('core_path' => $corePath));
            if (!($romanesco instanceof Romanesco)) {
                $modx->log(modX::LOG_LEVEL_ERROR, '[Romanesco] Class not found!');
                return false;
            }

            // This works!!
            $romanesco->runCommand(['gitify']);
            $romanesco->runCommand(['./operations','--help']);

            break;
    }
}

return true;