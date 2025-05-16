<?php
namespace FractalFarming\Romanesco;

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
 * @property \FractalFarming\Romanesco\rmCrossLink $CrossLinkTo
 * @property \FractalFarming\Romanesco\rmCrossLink $CrossLinkFrom
 *
 * @package FractalFarming\Romanesco
 */
class rmCrossLink extends \xPDO\Om\xPDOSimpleObject
{
}
