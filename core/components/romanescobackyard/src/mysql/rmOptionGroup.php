<?php
namespace FractalFarming\Romanesco\mysql;

use xPDO\xPDO;

class rmOptionGroup extends \FractalFarming\Romanesco\rmOptionGroup
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco',
        'version' => '3.0',
        'table' => 'romanesco_option_groups',
        'extends' => 'xPDO\\Om\\xPDOSimpleObject',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
            'name' => NULL,
            'description' => NULL,
            'key' => '',
            'pos' => 0,
            'deleted' => 0,
        ),
        'fieldMeta' => 
        array (
            'name' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '190',
                'phptype' => 'string',
                'null' => false,
            ),
            'description' => 
            array (
                'dbtype' => 'text',
                'phptype' => 'string',
                'null' => false,
            ),
            'key' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '190',
                'phptype' => 'string',
                'null' => true,
                'default' => '',
            ),
            'pos' => 
            array (
                'dbtype' => 'int',
                'precision' => '10',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
            ),
            'deleted' => 
            array (
                'dbtype' => 'tinyint',
                'precision' => '1',
                'attributes' => 'unsigned',
                'phptype' => 'boolean',
                'null' => false,
                'default' => 0,
            ),
        ),
        'fieldAliases' => 
        array (
            'position' => 'pos',
        ),
        'indexes' => 
        array (
            'pos' => 
            array (
                'alias' => 'pos',
                'primary' => false,
                'unique' => false,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'pos' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
        ),
        'composites' => 
        array (
            'Options' => 
            array (
                'class' => 'FractalFarming\\Romanesco\\rmOption',
                'local' => 'key',
                'foreign' => 'key',
                'cardinality' => 'many',
                'owner' => 'local',
            ),
        ),
    );

}
