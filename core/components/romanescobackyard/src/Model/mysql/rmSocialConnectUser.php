<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class rmSocialConnectUser extends \FractalFarming\Romanesco\Model\rmSocialConnectUser
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
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
