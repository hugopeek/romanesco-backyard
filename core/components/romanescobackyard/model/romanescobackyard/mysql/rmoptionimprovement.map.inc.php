<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmOptionImprovement']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'table' => 'romanesco_options_improvement',
  'extends' => 'rmOption',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'key' => 'status_improvement',
  ),
  'fieldMeta' => 
  array (
    'key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '190',
      'phptype' => 'string',
      'null' => true,
      'default' => 'status_improvement',
    ),
  ),
);
