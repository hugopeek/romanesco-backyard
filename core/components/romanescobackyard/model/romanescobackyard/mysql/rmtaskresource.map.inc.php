<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmTaskResource']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'extends' => 'rmTask',
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
    'Resource' => 
    array (
      'class' => 'modResource',
      'local' => 'parent_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
