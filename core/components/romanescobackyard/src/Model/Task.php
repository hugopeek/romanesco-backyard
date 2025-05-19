<?php
namespace FractalFarming\Romanesco\Model;

use xPDO\xPDO;

/**
 * Class Task
 *
 * @property string $class_key
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $priority
 * @property integer $complexity
 * @property string $date_start
 * @property string $date_due
 * @property string $tags
 * @property string $attachments
 * @property string $links
 * @property string $createdon
 * @property integer $createdby
 * @property boolean $deleted
 *
 * @property \FractalFarming\Romanesco\Model\TaskComment[] $Comments
 *
 * @package FractalFarming\Romanesco\Model
 */
class Task extends \xPDO\Om\xPDOSimpleObject
{
}
