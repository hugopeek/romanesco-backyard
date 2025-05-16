<?php
namespace FractalFarming\Romanesco\mysql;

use xPDO\xPDO;

class rmSocialConnectUser extends \FractalFarming\Romanesco\rmSocialConnectUser
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
