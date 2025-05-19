<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class SocialConnectResource extends \FractalFarming\Romanesco\Model\SocialConnectResource
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
        'version' => '3.0',
        'extends' => 'FractalFarming\\Romanesco\\Model\\SocialConnect',
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
