<?php
namespace FractalFarming\Romanesco\Model\mysql;

use xPDO\xPDO;

class TaskComment extends \FractalFarming\Romanesco\Model\TaskComment
{

    public static $metaMap = array (
        'package' => 'FractalFarming\\Romanesco\\Model',
        'version' => '3.0',
        'table' => 'romanesco_task_comments',
        'extends' => 'xPDO\\Om\\xPDOSimpleObject',
        'tableMeta' => 
        array (
            'engine' => 'InnoDB',
        ),
        'fields' => 
        array (
            'task_id' => 0,
            'content' => '',
            'createdon' => 0,
            'createdby' => 0,
            'deleted' => 0,
        ),
        'fieldMeta' => 
        array (
            'task_id' => 
            array (
                'dbtype' => 'int',
                'precision' => '11',
                'attributes' => 'unsigned',
                'phptype' => 'integer',
                'null' => false,
                'default' => 0,
            ),
            'content' => 
            array (
                'dbtype' => 'text',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
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
        ),
        'indexes' => 
        array (
            'task_id' => 
            array (
                'alias' => 'task_id',
                'primary' => false,
                'unique' => false,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'task_id' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
        ),
        'aggregates' => 
        array (
            'Task' => 
            array (
                'class' => 'FractalFarming\\Romanesco\\Model\\Task',
                'local' => 'task_id',
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
