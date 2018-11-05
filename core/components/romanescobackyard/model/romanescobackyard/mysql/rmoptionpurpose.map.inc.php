<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmOptionPurpose']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'table' => 'romanesco_options_priority',
  'extends' => 'rmOption',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'key' => 'content_priority',
  ),
  'fieldMeta' => 
  array (
    'key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '190',
      'phptype' => 'string',
      'null' => true,
      'default' => 'content_priority',
    ),
  ),
);
