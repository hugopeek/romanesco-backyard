<?php
/**
 *
 */

// Use external library for validating JSON
require_once '../../romanesco-patterns/core/components/romanesco/vendor/autoload.php';
use Seld\JsonLint\JsonParser;
$parser = new JsonParser();

// Get all JSON files from src folder
$sources = glob("{src/*.json,src/*/*.json,src/*/*/*.json}", GLOB_BRACE);

// Get template lists for linking TV assignments in bulk
$templateList = glob("{src_snippets/*}", GLOB_BRACE);

// Set base of config file
$baseArray = json_decode(file_get_contents('src/base.json'), TRUE);
$sourceArray = array();

foreach ($sources as $index => $source) {
    $json = file_get_contents($source);
    $validateSource = $parser->lint($json);

    // Check if file content is valid JSON
    if ($validateSource) {
        echo $validateSource . "\n";
        echo "Source: $source \n";
        echo "Validation failed.";
        return false;
    }

    // Skip base file
    if (strpos($source, 'base.json')) {
        continue;
    }

    // Decode file as associative array
    $sourceArray = json_decode($json, TRUE);

    // Append this data to the main array on each loop
    $baseArray = array_merge_recursive($baseArray,$sourceArray);
}

$output = json_encode($baseArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Fill placeholders with corresponding template names
foreach ($templateList as $file) {
    $list = file_get_contents($file);
    $list = str_replace(array("\r", "\n"), '', $list);
    $filename = pathinfo($file)['filename'];

    // Insert list wherever filename matches an @@template_list value
    $output = str_replace('@@' . $filename, $list, $output);
}

// Validate output one more time
$validateOutput = $parser->lint($output);
if ($validateOutput) {
    echo $validateOutput . "\n";
    echo "Validation of merged JSON failed.";
    return false;
}

// Write the config file
file_put_contents("config.json", $output);
echo 'Done.';

return;
