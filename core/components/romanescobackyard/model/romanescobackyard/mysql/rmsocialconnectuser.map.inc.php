<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmSocialConnectUser']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'extends' => 'rmSocialConnect',
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
      'class' => 'modUser',
      'local' => 'parent_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
