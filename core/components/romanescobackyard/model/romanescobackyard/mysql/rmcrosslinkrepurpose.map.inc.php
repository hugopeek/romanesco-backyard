<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmCrosslinkRepurpose']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'table' => 'romanesco_crosslinks_repurpose',
  'extends' => 'rmCrosslink',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'purpose' => '',
    'theme' => '',
    'topics' => '',
  ),
  'fieldMeta' => 
  array (
    'purpose' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'theme' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'topics' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
);
