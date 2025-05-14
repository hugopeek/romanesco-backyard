<?php
namespace FractalFarming\Romanesco\Model;

use xPDO\xPDO;

/**
 * Class rmCrossLink
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
 * @property \FractalFarming\Romanesco\Model\rmCrossLink $CrossLinkTo
 * @property \FractalFarming\Romanesco\Model\rmCrossLink $CrossLinkFrom
 *
 * @package FractalFarming\Romanesco\Model
 */
class rmCrossLink extends \xPDO\Om\xPDOSimpleObject
{
}
