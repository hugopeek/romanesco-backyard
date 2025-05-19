<?php
namespace FractalFarming\Romanesco\Model;

use xPDO\xPDO;

/**
 * Class LinkRelated
 *
 * @property integer $source
 * @property integer $destination
 * @property string $title
 * @property string $description
 * @property integer $crosslink_id
 * @property string $category
 * @property integer $weight
 * @property string $createdon
 * @property integer $createdby
 * @property boolean $deleted
 *
 * @property \FractalFarming\Romanesco\Model\LinkRelated $LinkTo
 * @property \FractalFarming\Romanesco\Model\LinkRelated $LinkFrom
 *
 * @package FractalFarming\Romanesco\Model
 */
class LinkRelated extends \xPDO\Om\xPDOSimpleObject
{
}
