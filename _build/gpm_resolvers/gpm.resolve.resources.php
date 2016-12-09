<?php
/**
 *
 * Resolve Resources
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package romanescobackyard
 * @subpackage build
 */

if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

if (!function_exists('getResourceMap')) {
    function getResourceMap() {
        global $modx;

        $assetsPath = rtrim($modx->getOption('romanescobackyard.assets_path',null,$modx->getOption('assets_path').'components/romanescobackyard/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';

        if (is_readable($rmf)) {
            $map = include $rmf;
        } else {
            $map = array();
        }

        return $map;
    }
}

if (!function_exists('setResourceMap')) {
    function setResourceMap($resourceMap) {
        global $modx;

        $assetsPath = rtrim($modx->getOption('romanescobackyard.assets_path',null,$modx->getOption('assets_path').'components/romanescobackyard/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';
        file_put_contents($rmf, '<?php return ' . var_export($resourceMap, true) . ';');

    }
}

if (!function_exists('createResource')) {
    function createResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }
        
        if (isset($resource['others'])) {
            $others = $resource['others'];
            unset($resource['others']);

            $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
            if (file_exists($taggerCorePath . 'model/tagger/tagger.class.php')) {
                /** @var Tagger $tagger */
                $tagger = $modx->getService(
                    'tagger',
                    'Tagger',
                    $taggerCorePath . 'model/tagger/',
                    array(
                        'core_path' => $taggerCorePath
                    )
                );
            
                $tagger = $tagger instanceof Tagger;
            } else {
                $tagger = null;
            }
            
            foreach ($others as $other) {
                if (($tagger == true) && (strpos($other['name'], 'tagger-') !== false)) {
                    $groupAlias = preg_replace('/tagger-/', '', $other['name'], 1);
            
                    $group = $modx->getObject('TaggerGroup', array('alias' => $groupAlias));
                    if ($group) {
                        $other['name'] = 'tagger-' . $group->id;
                    }
                }
            
                $resource[$other['name']] = $other['value'];
            }
        }

        $res = $modx->runProcessor('resource/create', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

if (!function_exists('updateResource')) {
    function updateResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }

        if (isset($resource['others'])) {
            $others = $resource['others'];
            unset($resource['others']);

            $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
            if (file_exists($taggerCorePath . 'model/tagger/tagger.class.php')) {
                /** @var Tagger $tagger */
                $tagger = $modx->getService(
                    'tagger',
                    'Tagger',
                    $taggerCorePath . 'model/tagger/',
                    array(
                        'core_path' => $taggerCorePath
                    )
                );
            
                $tagger = $tagger instanceof Tagger;
            } else {
                $tagger = null;
            }

            foreach ($others as $other) {
                if (($tagger == true) && (strpos($other['name'], 'tagger-') !== false)) {
                    $groupAlias = preg_replace('/tagger-/', '', $other['name'], 1);
                
                    $group = $modx->getObject('TaggerGroup', array('alias' => $groupAlias));
                    if ($group) {
                        $other['name'] = 'tagger-' . $group->id;
                    }
                }

                $resource[$other['name']] = $other['value'];
            }
        }

        $res = $modx->runProcessor('resource/update', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $resources = array (
  0 => 
  array (
    'pagetitle' => 'Footers',
    'alias' => 'footers',
    'parent' => 0,
    'content' => '',
    'context_key' => 'global',
    'class_key' => 'CollectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '6',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'searchable' => 0,
  ),
  1 => 
  array (
    'pagetitle' => 'Forms',
    'alias' => 'forms',
    'parent' => 0,
    'content' => '',
    'context_key' => 'global',
    'class_key' => 'CollectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '2',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'searchable' => 0,
  ),
  2 => 
  array (
    'pagetitle' => 'Call To Actions',
    'alias' => 'call-to-actions',
    'parent' => 0,
    'content' => '',
    'context_key' => 'global',
    'class_key' => 'CollectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '3',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'searchable' => 0,
  ),
  3 => 
  array (
    'pagetitle' => 'Backgrounds',
    'alias' => 'backgrounds',
    'parent' => 0,
    'content' => '',
    'context_key' => 'global',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'GlobalBackgrounds',
    'content_type' => 'css',
    'published' => 1,
    'searchable' => 0,
  ),
  4 => 
  array (
    'pagetitle' => 'Electrons',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/electrons.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 0,
  ),
  5 => 
  array (
    'pagetitle' => 'Atoms',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/atoms.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 1,
  ),
  6 => 
  array (
    'pagetitle' => 'Molecules',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/molecules.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 2,
  ),
  7 => 
  array (
    'pagetitle' => 'Organisms',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/organisms.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 3,
  ),
  8 => 
  array (
    'pagetitle' => 'Templates',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/templates.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 4,
  ),
  9 => 
  array (
    'pagetitle' => 'Pages',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/pages.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 5,
  ),
  10 => 
  array (
    'pagetitle' => 'Formulas',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/formulas.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 6,
  ),
  11 => 
  array (
    'pagetitle' => 'Computations',
    'alias' => '',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'overview_icon_svg' => 
      array (
        'name' => 'overview_icon_svg',
        'value' => 'romanesco/computations.svg',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'collections_template',
        'value' => '7',
      ),
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 7,
  ),
  12 => 
  array (
    'pagetitle' => 'Project Hub',
    'alias' => 'project-hub',
    'parent' => 0,
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'ProjectHub',
    'published' => 1,
    'menuindex' => 1,
  ),
  13 => 
  array (
    'pagetitle' => 'Pattern Library',
    'alias' => 'pattern-library',
    'parent' => 0,
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 2,
  ),
  14 => 
  array (
    'pagetitle' => 'Status Grid',
    'alias' => 'status-grid',
    'parent' => 0,
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicOverview',
    'published' => 1,
    'menuindex' => 10,
  ),
  15 => 
  array (
    'pagetitle' => 'Backgrounds CSS',
    'alias' => 'assets/css/backgrounds',
    'parent' => 0,
    'content' => '[[++patternlab.global_backgrounds_id]]',
    'context_key' => 'web',
    'class_key' => 'modSymLink',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 0,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'GlobalBackgrounds',
    'content_type' => 'css',
    'published' => 1,
    'hidemenu' => 1,
    'searchable' => 0,
  ),
  16 => 
  array (
    'pagetitle' => 'Action',
    'alias' => 'action',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  17 => 
  array (
    'pagetitle' => 'CreativeWork',
    'alias' => 'creativework',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  18 => 
  array (
    'pagetitle' => 'Event',
    'alias' => 'event',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  19 => 
  array (
    'pagetitle' => 'Intangible',
    'alias' => 'intangible',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  20 => 
  array (
    'pagetitle' => 'Organization',
    'alias' => 'organization',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  21 => 
  array (
    'pagetitle' => 'Person',
    'alias' => 'person',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  22 => 
  array (
    'pagetitle' => 'Place',
    'alias' => 'place',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  23 => 
  array (
    'pagetitle' => 'Product',
    'alias' => 'product',
    'parent' => 'Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  24 => 
  array (
    'pagetitle' => 'Connections',
    'alias' => 'connections',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  25 => 
  array (
    'pagetitle' => 'ContentBlocks',
    'alias' => 'contentblocks',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  26 => 
  array (
    'pagetitle' => 'CTAs',
    'alias' => 'cta',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  27 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  28 => 
  array (
    'pagetitle' => 'Global',
    'alias' => 'global',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  29 => 
  array (
    'pagetitle' => 'Headers',
    'alias' => 'headers',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  30 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  31 => 
  array (
    'pagetitle' => 'Information',
    'alias' => 'information',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  32 => 
  array (
    'pagetitle' => 'Overviews',
    'alias' => 'overviews',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  33 => 
  array (
    'pagetitle' => 'Search',
    'alias' => 'search',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  34 => 
  array (
    'pagetitle' => 'Social',
    'alias' => 'social',
    'parent' => 'Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  35 => 
  array (
    'pagetitle' => 'Fields',
    'alias' => 'fields',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  36 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  37 => 
  array (
    'pagetitle' => 'Layouts',
    'alias' => 'layouts',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  38 => 
  array (
    'pagetitle' => 'Overviews',
    'alias' => 'overviews',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  39 => 
  array (
    'pagetitle' => 'Select',
    'alias' => 'select',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  40 => 
  array (
    'pagetitle' => 'Settings',
    'alias' => 'settings',
    'parent' => 'ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  41 => 
  array (
    'pagetitle' => 'Buttons',
    'alias' => 'buttons',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  42 => 
  array (
    'pagetitle' => 'Content',
    'alias' => 'content',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  43 => 
  array (
    'pagetitle' => 'ContentBlocks',
    'alias' => 'contentblocks',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  44 => 
  array (
    'pagetitle' => 'Data',
    'alias' => 'data',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  45 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  46 => 
  array (
    'pagetitle' => 'Global',
    'alias' => 'global',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  47 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  48 => 
  array (
    'pagetitle' => 'Images',
    'alias' => 'images',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  49 => 
  array (
    'pagetitle' => 'Information',
    'alias' => 'information',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  50 => 
  array (
    'pagetitle' => 'Navigation',
    'alias' => 'navigation',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  51 => 
  array (
    'pagetitle' => 'Presentation',
    'alias' => 'presentation',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  52 => 
  array (
    'pagetitle' => 'Search',
    'alias' => 'search',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  53 => 
  array (
    'pagetitle' => 'Select',
    'alias' => 'select',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  54 => 
  array (
    'pagetitle' => 'Taxonomy',
    'alias' => 'taxonomy',
    'parent' => 'Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  55 => 
  array (
    'pagetitle' => 'Article',
    'alias' => 'article',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  56 => 
  array (
    'pagetitle' => 'Basic',
    'alias' => 'basic',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  57 => 
  array (
    'pagetitle' => 'Icon',
    'alias' => 'icon',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  58 => 
  array (
    'pagetitle' => 'Image',
    'alias' => 'image',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  59 => 
  array (
    'pagetitle' => 'Organization',
    'alias' => 'organization',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  60 => 
  array (
    'pagetitle' => 'Person',
    'alias' => 'person',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  61 => 
  array (
    'pagetitle' => 'Project',
    'alias' => 'project',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  62 => 
  array (
    'pagetitle' => 'Review',
    'alias' => 'review',
    'parent' => 'Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  63 => 
  array (
    'pagetitle' => 'Content',
    'alias' => 'content',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  64 => 
  array (
    'pagetitle' => 'CTAs',
    'alias' => 'cta',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  65 => 
  array (
    'pagetitle' => 'Data',
    'alias' => 'data',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  66 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  67 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  68 => 
  array (
    'pagetitle' => 'Information',
    'alias' => 'information',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  69 => 
  array (
    'pagetitle' => 'Layouts',
    'alias' => 'layouts',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  70 => 
  array (
    'pagetitle' => 'Navigation',
    'alias' => 'navigation',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  71 => 
  array (
    'pagetitle' => 'Overviews',
    'alias' => 'overviews',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  72 => 
  array (
    'pagetitle' => 'Presentation',
    'alias' => 'presentation',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  73 => 
  array (
    'pagetitle' => 'Publication',
    'alias' => 'publication',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  74 => 
  array (
    'pagetitle' => 'Search',
    'alias' => 'search',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  75 => 
  array (
    'pagetitle' => 'Social',
    'alias' => 'social',
    'parent' => 'Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  76 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  77 => 
  array (
    'pagetitle' => 'Global',
    'alias' => 'global',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  78 => 
  array (
    'pagetitle' => 'Headers',
    'alias' => 'headers',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  79 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  80 => 
  array (
    'pagetitle' => 'Layouts',
    'alias' => 'layouts',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  81 => 
  array (
    'pagetitle' => 'Overviews',
    'alias' => 'overviews',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  82 => 
  array (
    'pagetitle' => 'Presentation',
    'alias' => 'presentation',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  83 => 
  array (
    'pagetitle' => 'Search',
    'alias' => 'search',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  84 => 
  array (
    'pagetitle' => 'Social',
    'alias' => 'social',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  85 => 
  array (
    'pagetitle' => 'Toolbars',
    'alias' => 'toolbars',
    'parent' => 'Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  86 => 
  array (
    'pagetitle' => 'Basic',
    'alias' => 'basic',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  87 => 
  array (
    'pagetitle' => 'Confirmation',
    'alias' => 'confirmation',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  88 => 
  array (
    'pagetitle' => 'Global',
    'alias' => 'global',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  89 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  90 => 
  array (
    'pagetitle' => 'People',
    'alias' => 'people',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  91 => 
  array (
    'pagetitle' => 'Publication',
    'alias' => 'publication',
    'parent' => 'Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  92 => 
  array (
    'pagetitle' => 'Web',
    'alias' => 'web',
    'parent' => 'Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  93 => 
  array (
    'pagetitle' => 'Global Content',
    'alias' => 'global',
    'parent' => 'Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  94 => 
  array (
    'pagetitle' => 'Project Hub',
    'alias' => 'hub',
    'parent' => 'Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  95 => 
  array (
    'pagetitle' => 'Basic',
    'alias' => 'basic',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  96 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  97 => 
  array (
    'pagetitle' => 'Framework',
    'alias' => 'framework',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  98 => 
  array (
    'pagetitle' => 'Hub',
    'alias' => 'hub',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  99 => 
  array (
    'pagetitle' => 'JSON',
    'alias' => 'json',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  100 => 
  array (
    'pagetitle' => 'Modifiers',
    'alias' => 'modifiers',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  101 => 
  array (
    'pagetitle' => 'Presentation',
    'alias' => 'presentation',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  102 => 
  array (
    'pagetitle' => 'Resources',
    'alias' => 'resources',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  103 => 
  array (
    'pagetitle' => 'Template Variables',
    'alias' => 'templatevars',
    'parent' => 'Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  104 => 
  array (
    'pagetitle' => 'FormBlocks',
    'alias' => 'formblocks',
    'parent' => 'Computations',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
  105 => 
  array (
    'pagetitle' => 'Global',
    'alias' => 'global',
    'parent' => 'Computations',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'link_attributes' => '',
    'properties' => '',
    'template' => 'BasicDetail',
    'published' => 1,
  ),
);

        if (isset($options['install_resources']) && empty($options['install_resources'])) return true;

        $resourceMap = getResourceMap();
        $toRemove = $resourceMap;
        $siteStart = $modx->getOption('site_start');

        foreach ($resources as $resource) {
            if (is_string($resource['parent'])) {
                if (isset($resourceMap[$resource['parent']])) {
                    $resource['parent'] = $resourceMap[$resource['parent']];
                } else {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('pagetitle' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                }
            } else {
                if ($resource['parent'] != 0) {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('id' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                } else {
                    $resource['parent'] = 0;
                }
            }

            if ($resource['template'] !== null) {
                if ($resource['template'] !== 0) {
                    $template = $modx->getObject('modTemplate', array('templatename' => $resource['template']));
                    if ($template) {
                        $resource['template'] = $template->id;
                    }
                } else {
                    $resource['template'] = 0;
                }
            }

            if ($resource['content_type'] !== null) {
                $content_type = $modx->getObject('modContentType', array('name' => $resource['content_type']));
                if ($content_type) {
                    $resource['content_type'] = $content_type->id;
                }
            } else {
                $resource['content_type'] = $modx->getOption('default_content_type', null, 1);
            }

            if (isset($resourceMap[$resource['pagetitle']])) {
                unset($toRemove[$resource['pagetitle']]);

                /** @var modResource $exists */
                $exists = $modx->getObject('modResource', array('id' => $resourceMap[$resource['pagetitle']]));
                if ($exists) {
                    $resource['id'] = $exists->id;
                    $resId = updateResource($resource);

                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                } else {
                    if ($resource['set_as_home'] == 1) {
                        unset($resource['set_as_home']);
                        $resource['id'] = $siteStart;

                        $resId = updateResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    } else {
                        $resId = createResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    }
                }
            } else {
                if ($resource['set_as_home'] == 1) {
                    unset($resource['set_as_home']);
                    $resource['id'] = $siteStart;
                
                    $resId = updateResource($resource);
                
                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                } else {
                    $resId = createResource($resource);

                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                }
            }
        }

        foreach ($toRemove as $pageTitle => $resource) {
            unset($resourceMap[$pageTitle]);

            if ($resource == $siteStart) continue;

            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', $resource);
            if ($modResource) {
                $modx->updateCollection('modResource', array('parent' => 0), array('parent' => $resource));

                $modResource->remove();
            }
        }

        setResourceMap($resourceMap);

        break;
    case xPDOTransport::ACTION_UNINSTALL:

        break;
}

return true;