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
    'pagetitle' => '00 - Electrons',
    'alias' => 'electrons',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Electrons',
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
    'pagetitle' => '01 - Atoms',
    'alias' => 'atoms',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Atoms',
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
    'pagetitle' => '02 - Molecules',
    'alias' => 'molecules',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Molecules',
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
    'pagetitle' => '03 - Organisms',
    'alias' => 'organisms',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Organisms',
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
    'pagetitle' => '04 - Templates',
    'alias' => 'templates',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Templates',
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
    'pagetitle' => '05 - Pages',
    'alias' => 'pages',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Pages',
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
    'pagetitle' => '06 - Formulas',
    'alias' => 'formulas',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Formulas',
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
    'pagetitle' => '07 - Computations',
    'alias' => 'computations',
    'parent' => 'Pattern library',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Computations',
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
    'content' => '[[++romanesco.global_backgrounds_id]]',
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
    'pagetitle' => '00 - Information - Action',
    'alias' => 'action',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Action',
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
    'pagetitle' => '00 - Information - Creative Work',
    'alias' => 'creativework',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Creative Work',
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
    'pagetitle' => '00 - Information - Event',
    'alias' => 'event',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Event',
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
    'pagetitle' => '00 - Information - Intangible',
    'alias' => 'intangible',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Intangible',
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
    'pagetitle' => '00 - Information - Organization',
    'alias' => 'organization',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Organization',
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
    'pagetitle' => '00 - Information - Person',
    'alias' => 'person',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Person',
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
    'pagetitle' => '00 - Information - Place',
    'alias' => 'place',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Place',
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
    'pagetitle' => '00 - Information - Product',
    'alias' => 'product',
    'parent' => '00 - Information',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Product',
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
    'pagetitle' => '00 - Connections',
    'alias' => 'connections',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Connections',
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
    'pagetitle' => '00 - ContentBlocks',
    'alias' => 'contentblocks',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'ContentBlocks',
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
    'pagetitle' => '00 - CTAs',
    'alias' => 'cta',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'CTAs',
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
    'pagetitle' => '00 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '00 - Global',
    'alias' => 'global',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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
    'pagetitle' => '00 - Headers',
    'alias' => 'headers',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Headers',
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
    'pagetitle' => '00 - Hub',
    'alias' => 'hub',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '00 - Information',
    'alias' => 'information',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Information',
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
    'pagetitle' => '00 - Overviews',
    'alias' => 'overviews',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Overviews',
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
    'pagetitle' => '00 - Search',
    'alias' => 'search',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Search',
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
    'pagetitle' => '00 - Social',
    'alias' => 'social',
    'parent' => '00 - Electrons',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Social',
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
    'pagetitle' => '01 - ContentBlocks - Fields',
    'alias' => 'fields',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Fields',
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
    'pagetitle' => '01 - ContentBlocks - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '01 - ContentBlocks - Layouts',
    'alias' => 'layouts',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Layouts',
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
    'pagetitle' => '01 - ContentBlocks - Overviews',
    'alias' => 'overviews',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Overviews',
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
    'pagetitle' => '01 - ContentBlocks - Select',
    'alias' => 'select',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Select',
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
    'pagetitle' => '01 - ContentBlocks - Settings',
    'alias' => 'settings',
    'parent' => '01 - ContentBlocks',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Settings',
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
    'pagetitle' => '01 - Buttons',
    'alias' => 'buttons',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Buttons',
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
    'pagetitle' => '01 - Content',
    'alias' => 'content',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Content',
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
    'pagetitle' => '01 - ContentBlocks',
    'alias' => 'contentblocks',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'ContentBlocks',
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
    'pagetitle' => '01 - Data',
    'alias' => 'data',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Data',
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
    'pagetitle' => '01 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '01 - Global',
    'alias' => 'global',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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
    'pagetitle' => '01 - Hub',
    'alias' => 'hub',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '01 - Images',
    'alias' => 'images',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Images',
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
    'pagetitle' => '01 - Information',
    'alias' => 'information',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Information',
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
    'pagetitle' => '01 - Navigation',
    'alias' => 'navigation',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Navigation',
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
    'pagetitle' => '01 - Presentation',
    'alias' => 'presentation',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Presentation',
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
    'pagetitle' => '01 - Search',
    'alias' => 'search',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Search',
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
    'pagetitle' => '01 - Select',
    'alias' => 'select',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Select',
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
    'pagetitle' => '01 - Taxonomy',
    'alias' => 'taxonomy',
    'parent' => '01 - Atoms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Taxonomy',
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
    'pagetitle' => '02 - Overviews - Article',
    'alias' => 'article',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Article',
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
    'pagetitle' => '02 - Overviews - Basic',
    'alias' => 'basic',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Basic',
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
    'pagetitle' => '02 - Overviews - Icon',
    'alias' => 'icon',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Icon',
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
    'pagetitle' => '02 - Overviews - Image',
    'alias' => 'image',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Image',
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
    'pagetitle' => '02 - Overviews - Organization',
    'alias' => 'organization',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Organization',
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
    'pagetitle' => '02 - Overviews - Person',
    'alias' => 'person',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Person',
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
    'pagetitle' => '02 - Overviews - Project',
    'alias' => 'project',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Project',
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
    'pagetitle' => '02 - Overviews - Review',
    'alias' => 'review',
    'parent' => '02 - Overviews',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Review',
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
    'pagetitle' => '02 - Content',
    'alias' => 'content',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Content',
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
    'pagetitle' => '02 - CTAs',
    'alias' => 'cta',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'CTAs',
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
    'pagetitle' => '02 - Data',
    'alias' => 'data',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Data',
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
    'pagetitle' => '02 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '02 - Hub',
    'alias' => 'hub',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '02 - Information',
    'alias' => 'information',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Information',
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
    'pagetitle' => '02 - Layouts',
    'alias' => 'layouts',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Layouts',
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
    'pagetitle' => '02 - Navigation',
    'alias' => 'navigation',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Navigation',
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
    'pagetitle' => '02 - Overviews',
    'alias' => 'overviews',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Overviews',
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
    'pagetitle' => '02 - Presentation',
    'alias' => 'presentation',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Presentation',
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
    'pagetitle' => '02 - Publication',
    'alias' => 'publication',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Publication',
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
    'pagetitle' => '02 - Search',
    'alias' => 'search',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Search',
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
    'pagetitle' => '02 - Social',
    'alias' => 'social',
    'parent' => '02 - Molecules',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Social',
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
    'pagetitle' => '03 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '03 - Global',
    'alias' => 'global',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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
    'pagetitle' => '03 - Headers',
    'alias' => 'headers',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Headers',
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
    'pagetitle' => '03 - Hub',
    'alias' => 'hub',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '03 - Layouts',
    'alias' => 'layouts',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Layouts',
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
    'pagetitle' => '03 - Overviews',
    'alias' => 'overviews',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Overviews',
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
    'pagetitle' => '03 - Presentation',
    'alias' => 'presentation',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Presentation',
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
    'pagetitle' => '03 - Search',
    'alias' => 'search',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Search',
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
    'pagetitle' => '03 - Social',
    'alias' => 'social',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Social',
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
    'pagetitle' => '03 - Toolbars',
    'alias' => 'toolbars',
    'parent' => '03 - Organisms',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Toolbars',
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
    'pagetitle' => '04 - Basic',
    'alias' => 'basic',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Basic',
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
    'pagetitle' => '04 - Confirmation',
    'alias' => 'confirmation',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Confirmation',
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
    'pagetitle' => '04 - Global',
    'alias' => 'global',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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
    'pagetitle' => '04 - Hub',
    'alias' => 'hub',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '04 - People',
    'alias' => 'people',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'People',
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
    'pagetitle' => '04 - Publication',
    'alias' => 'publication',
    'parent' => '04 - Templates',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Publication',
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
    'pagetitle' => '05 - Web',
    'alias' => 'web',
    'parent' => '05 - Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Web',
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
    'pagetitle' => '05 - Global Content',
    'alias' => 'global',
    'parent' => '05 - Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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
    'pagetitle' => '05 - Project Hub',
    'alias' => 'hub',
    'parent' => '05 - Pages',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '06 - Basic',
    'alias' => 'basic',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Basic',
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
    'pagetitle' => '06 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '06 - Framework',
    'alias' => 'framework',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Framework',
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
    'pagetitle' => '06 - Hub',
    'alias' => 'hub',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Hub',
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
    'pagetitle' => '06 - JSON',
    'alias' => 'json',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'JSON',
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
    'pagetitle' => '06 - Modifiers',
    'alias' => 'modifiers',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Modifiers',
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
    'pagetitle' => '06 - Presentation',
    'alias' => 'presentation',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Presentation',
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
    'pagetitle' => '06 - Resources',
    'alias' => 'resources',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Resources',
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
    'pagetitle' => '06 - Template Variables',
    'alias' => 'templatevars',
    'parent' => '06 - Formulas',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'TVs',
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
    'pagetitle' => '07 - FormBlocks',
    'alias' => 'formblocks',
    'parent' => '07 - Computations',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'FormBlocks',
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
    'pagetitle' => '07 - Global',
    'alias' => 'global',
    'parent' => '07 - Computations',
    'content' => '',
    'context_key' => 'hub',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => 'Global',
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