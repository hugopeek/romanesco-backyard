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

$manager->createObjectContainer(FractalFarming\Romanesco\Model\Task::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\TaskComment::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\CrossLink::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\ExternalLink::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\SocialConnect::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\SocialShare::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\Option::class);
$manager->createObjectContainer(FractalFarming\Romanesco\Model\OptionGroup::class);

return true;
