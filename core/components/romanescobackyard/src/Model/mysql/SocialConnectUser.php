<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class SocialConnectUser extends \FractalFarming\Romanesco\Model\SocialConnectUser
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
            'User' => 
            array (
                'class' => 'MODX\\Revolution\\modUser',
                'local' => 'parent_id',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
    );

}
