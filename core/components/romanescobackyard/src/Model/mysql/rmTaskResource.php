<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class rmTaskResource extends \FractalFarming\Romanesco\Model\rmTaskResource
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
        'version' => '3.0',
        'extends' => 'FractalFarming\\Romanesco\\Model\\rmTask',
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
