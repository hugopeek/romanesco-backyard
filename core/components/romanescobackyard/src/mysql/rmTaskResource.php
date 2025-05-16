<?php
namespace FractalFarming\Romanesco\mysql;

use xPDO\xPDO;

class rmTaskResource extends \FractalFarming\Romanesco\rmTaskResource
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco',
        'version' => '3.0',
        'extends' => 'FractalFarming\\Romanesco\\rmTask',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
        ),
        'fieldMeta' => 
        array (
        ),
        'aggregates' => 
        array (
            'Resource' => 
            array (
                'class' => 'MODX\\Revolution\\modResource',
                'local' => 'parent_id',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
    );

}
