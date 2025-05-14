<?php
/**
 * @var \MODX\Revolution\modX $modx
 * @var array $namespace
 */

// Add your classes to modx's autoloader
\MODX\Revolution\modX::getLoader()->addPsr4('FractalFarming\Romanesco\\', $namespace['path'] . 'src/');

if (!$modx->services->has('romanescobackyard')) {
    // Register base class in the service container
    $modx->services->add('romanescobackyard', function($c) use ($modx) {
        return new \FractalFarming\Romanesco\Romanesco($modx);
    });

    // Load packages model
    $modx->addPackage('FractalFarming\Romanesco\Model', $namespace['path'] . 'src/', null, 'FractalFarming\Romanesco\\');
}
