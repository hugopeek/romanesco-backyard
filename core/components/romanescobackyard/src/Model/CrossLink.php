<?php
namespace FractalFarming\Romanesco\Model;

use xPDO\xPDO;

/**
 * Class CrossLink
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
 * @property \FractalFarming\Romanesco\Model\CrossLink $CrossLinkTo
 * @property \FractalFarming\Romanesco\Model\CrossLink $CrossLinkFrom
 *
 * @package FractalFarming\Romanesco\Model
 */
class CrossLink extends \xPDO\Om\xPDOSimpleObject
{
}
