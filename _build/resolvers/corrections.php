<?php
/**
 * DEPRECATED.
 *
 * @var array $options
 * @var xPDOObject $object
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            // Fix getPage property set by assigning its new ID
            $query = $modx->newQuery('modSnippet');
            $query->where(array(
                'name' => 'getPage',
            ));
            $query->select('id');
            $getPageID = $modx->getValue($query->prepare());

            // Save doesn't work in the code below.. Bug?
            //$getPagePropertySet = $modx->getObject('modElementPropertySet', array(
            //    'element' => 11,
            //    'element_class' => 'modSnippet',
            //    'property_set' => 1,
            //));
            //if (is_object($getPagePropertySet)) {
            //    $getPagePropertySet->set('element', $getPageID);
            //    $getPagePropertySet->save();
            //}

            // No, just an edge case. Single field can't be updated when primary key consists of multiple fields.

            // Save with direct PDO query instead
            $table = $modx->getTableName('modElementPropertySet');
            $update = $modx->prepare("UPDATE " . $table . " SET `element`='" . $getPageID . "' WHERE `element`=" . 11);

            $update->execute();

            break;
    }
}
$modx->log(xPDO::LOG_LEVEL_INFO, '[Romanesco] Corrections successfully applied.');

return true;