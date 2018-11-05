<?php
/**
 * @package romanescobackyard
 */
$xpdo_meta_map['rmTimelineProject']= array (
  'package' => 'romanescobackyard',
  'version' => '1.1',
  'table' => 'romanesco_timeline_project',
  'extends' => 'rmTimeline',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'type' => 'project-hub',
    'user' => 0,
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
      'default' => 'project-hub',
    ),
    'user' => 
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
    'assigned_to' => 'user',
  ),
);
