<?php
/**
 * @var \MODX\Revolution\modX $modx
 * @var array $namespace
 */

// Add your classes to modx's autoloader
\MODX\Revolution\modX::getLoader()->addPsr4('FractalFarming\Romanesco\\', $namespace['path'] . 'src/');

if (!$modx->services->has('romanesco')) {
    // Register base class in the service container
    $modx->services->add('romanesco', function($c) use ($modx) {
        return new \FractalFarming\Romanesco\Romanesco($modx);
    });

    // Load packages model
    $modx->addPackage('FractalFarming\Romanesco', $namespace['path'] . 'src/', null, 'FractalFarming\Romanesco\\');
}
