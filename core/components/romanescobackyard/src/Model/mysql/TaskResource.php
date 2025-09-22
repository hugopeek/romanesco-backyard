<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class TaskResource extends \FractalFarming\Romanesco\Model\TaskResource
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
        'version' => '3.0',
        'extends' => 'FractalFarming\\Romanesco\\Model\\Task',
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
