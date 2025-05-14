<?php
use xPDO\Transport\xPDOTransport;

/**
 * Create tables
 *
 * THIS SCRIPT IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package romanescobackyard
 * @subpackage build.scripts
 *
 * @var \xPDO\Transport\xPDOTransport $transport
 * @var array $object
 * @var array $options
 */

$modx =& $transport->xpdo;

if ($options[xPDOTransport::PACKAGE_ACTION] === xPDOTransport::ACTION_UNINSTALL) return true;

$manager = $modx->getManager();

$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmTask::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmTaskComment::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmCrossLink::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmExternalLink::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmSocialConnect::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmSocialShare::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmOption::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\rmOptionGroup::class);

return true;
