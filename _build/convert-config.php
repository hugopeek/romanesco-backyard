<?php
/**
 *
 */

// Use external library for validating JSON
require_once '../../patterns/core/components/romanesco/vendor/autoload.php';

use Seld\JsonLint\JsonParser;
use Symfony\Component\Yaml\Yaml;

$parser = new JsonParser();

// Back to JSON
$config = file_get_contents('config.json');

// Validate output
$validateOutput = $parser->lint($config);
if ($validateOutput) {
    echo $validateOutput . "\n";
    echo "Validation of merged JSON failed.";
    return false;
} else {
    echo "Config file is valid JSON. \n";
}

// Back to array, so we can convert this output for MODX 3.x
$data = json_decode($config, true);

// Move the contents of "package" and "elements" to the root
$elementsData = $data['package']['elements'] ?? [];
$settingsData = $data['package']['systemSettings'] ?? [];
$menuData = $data['package']['menus'] ?? [];
unset($data['package']);
unset($data['actions']);
unset($data['resources']);
$data = array_merge($data, $elementsData);
$data['menus'] = $menuData;
$data['systemSettings'] = $settingsData;

// Remove 2.x categories with parent references
if (isset($data['categories'])) {
    $i = 0;
    foreach ($data['categories'] as $category) {
        if (array_key_exists('parent', $category)) {
            unset($data['categories'][$i]);
        }
        $i++;
    }
}

// Change renamed array keys
function changeKeyRecursive(array $array, $oldKey, $newKey): array
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $array[$key] = changeKeyRecursive($value, $oldKey, $newKey);
        }
        if ($key === $oldKey) {
            $array[$newKey] = $array[$oldKey];
            unset($array[$oldKey]);
        }
    }
    return $array;
}
if (isset($data['tvs'])) {
    $data['tvs'] = changeKeyRecursive($data['tvs'], 'inputProperties', 'inputOptions');
    $data['tvs'] = changeKeyRecursive($data['tvs'], 'outputProperties', 'outputOptions');
    $data['tvs'] = changeKeyRecursive($data['tvs'], 'display', 'outputType');

    // Rearrange TV properties
    foreach ($data['tvs'] as &$tv) {
        // Move name to start of array
        if (array_key_exists('name', $tv)) {
            $name = ['name' => $tv['name']];
            unset($tv['name']);
            $tv = $name + $tv;
        }
        // Move templates to end of array
        if (array_key_exists('templates', $tv)) {
            $templateList = $tv['templates'];
            unset($tv['templates']);
            $tv['templates'] = $templateList;
        }
    }
}
if (isset($data['plugins'])) {
    $data['plugins'] = changeKeyRecursive($data['plugins'], 'event', 'name');
    $data['plugins'] = changeKeyRecursive($data['plugins'], 'priority', 'flip');
    $data['plugins'] = changeKeyRecursive($data['plugins'], 'flip', 'priority');
}

// Change paths to docs
$data['build']['readme'] = 'core/components/romanescobackyard/' . $data['build']['readme'];
$data['build']['license'] = 'core/components/romanescobackyard/' . $data['build']['license'];
$data['build']['changelog'] = 'core/components/romanescobackyard/' . $data['build']['changelog'];

// Convert the PHP array to YAML
$yaml = Yaml::dump($data, 8, 2, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK);
$yaml = preg_replace('/-\s+name:/', '- name:', $yaml);
$yaml = preg_replace('/-\s+key:/', '- key:', $yaml);
$yaml = preg_replace('/-\s+text:/', '- text:', $yaml);

// Compare altered Yaml with original array
try {
    Yaml::parse($yaml);
    echo "Config file is valid Yaml.\n";
} catch (\Exception $e) {
    echo $e->getMessage();
    return false;
}

// Write config file for MODX 3.x
//file_put_contents("gpm.json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
file_put_contents("gpm.yaml", $yaml);
echo "Config file for 3.x successfully built.\n";

return;
