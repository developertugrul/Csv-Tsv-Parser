<?php

require_once 'Parser.php';

$parser = new Parser();

try {
    // send examples/example_1.csv to Parser::parse()
    $file = [
        'name' => 'example_1.csv',
        'tmp_name' => 'examples/example_1.csv'
    ];
    $productsCSV = $parser->parse($file);
    echo "CSV parsing successful!\n";
} catch (Exception $e) {
    echo "CSV parsing failed: " . $e->getMessage() . "\n";
}

try {
    $file = [
        'name' => 'example_1.tsv',
        'tmp_name' => 'examples/example_1.tsv'
    ];
    $productsTSV = $parser->parse($file);
    echo "TSV parsing successful!\n";
} catch (Exception $e) {
    echo "TSV parsing failed: " . $e->getMessage() . "\n";
}

try {
    $file = [
        'name' => 'example_1.json',
        'tmp_name' => 'examples/example_1.json'
    ];
    $productsJSON = $parser->parse($file);
    echo "JSON parsing successful!\n";
} catch (Exception $e) {
    echo "JSON parsing failed: " . $e->getMessage() . "\n";
}

try {
    $file = [
        'name' => 'example_1.xml',
        'tmp_name' => 'examples/example_1.xml'
    ];
    $productsXML = $parser->parse($file);
    echo "XML parsing successful!\n";
} catch (Exception $e) {
    echo "XML parsing failed: " . $e->getMessage() . "\n";
}
