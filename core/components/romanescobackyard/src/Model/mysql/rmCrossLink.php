<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class rmCrossLink extends \FractalFarming\Romanesco\Model\rmCrossLink
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
        'version' => '3.0',
        'table' => 'romanesco_crosslinks',
        'extends' => 'xPDO\\Om\\xPDOSimpleObject',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
            'source' => 0,
            'destination' => 0,
            'title' => '',
            'description' => '',
            'crosslink_id' => 0,
            'category' => '',
            'weight' => 0,
            'createdon' => 0,
            'createdby' => 0,
            'deleted' => 0,
        ),
        'fieldMeta' => 
        array (
            'source' => 
            array (
                'dbtype' => 'int',
                'precision' => '11',
                'attributes' => 'unsigned',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
            ),
            'destination' => 
            array (
                'dbtype' => 'int',
                'precision' => '11',
                'attributes' => 'unsigned',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
            ),
            'title' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '191',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'description' => 
            array (
                'dbtype' => 'text',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'crosslink_id' => 
            array (
                'dbtype' => 'int',
                'precision' => '11',
                'attributes' => 'unsigned',
                'phptype' => 'integer',
                'null' => true,
                'default' => 0,
            ),
            'category' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '191',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'weight' => 
            array (
                'dbtype' => 'int',
                'precision' => '10',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
            ),
            'createdon' => 
            array (
                'dbtype' => 'int',
                'precision' => '20',
                'phptype' => 'timestamp',
                'null' => false,
                'default' => 0,
            ),
            'createdby' => 
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
            'author_id' => 'createdby',
            'resource_id' => 'source',
        ),
        'indexes' => 
        array (
            'crosslink' => 
            array (
                'alias' => 'crosslink',
                'primary' => false,
                'unique' => true,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'source' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                    'destination' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
            'category' => 
            array (
                'alias' => 'category',
                'primary' => false,
                'unique' => false,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'category' => 
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
            'CrossLinkTo' => 
            array (
                'class' => 'FractalFarming\\Romanesco\\Model\\rmCrossLink',
                'local' => 'id',
                'foreign' => 'crosslink_id',
                'cardinality' => 'one',
                'owner' => 'local',
            ),
            'CrossLinkFrom' => 
            array (
                'class' => 'FractalFarming\\Romanesco\\Model\\rmCrossLink',
                'local' => 'crosslink_id',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
        'aggregates' => 
        array (
            'Source' => 
            array (
                'class' => 'MODX\\Revolution\\modResource',
                'local' => 'source',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
            'Destination' => 
            array (
                'class' => 'MODX\\Revolution\\modResource',
                'local' => 'destination',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
            'Author' => 
            array (
                'class' => 'MODX\\Revolution\\modUser',
                'local' => 'createdby',
                'foreign' => 'id',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
    );

}
