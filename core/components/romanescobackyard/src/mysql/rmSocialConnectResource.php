<?php
namespace FractalFarming\Romanesco\mysql;

use xPDO\xPDO;

class rmSocialConnectResource extends \FractalFarming\Romanesco\rmSocialConnectResource
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco',
        'version' => '3.0',
        'extends' => 'FractalFarming\\Romanesco\\rmSocialConnect',
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
