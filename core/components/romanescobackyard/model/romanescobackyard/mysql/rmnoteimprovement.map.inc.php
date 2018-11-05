<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmNoteImprovement']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'table' => 'romanesco_notes_improvement',
  'extends' => 'rmNote',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'type' => 'improvement',
    'status' => 0,
    'priority' => 0,
    'complexity' => 0,
    'attachments' => '',
    'links' => '',
  ),
  'fieldMeta' => 
  array (
    'type' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '190',
      'phptype' => 'string',
      'null' => true,
      'default' => 'improvement',
    ),
    'status' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'priority' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'complexity' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'attachments' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'links' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
  'fieldAliases' => 
  array (
    'improvements' => 'tags',
  ),
);
