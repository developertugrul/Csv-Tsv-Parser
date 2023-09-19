<?php

require_once 'Parser.php';
require_once 'UniqueCombinations.php';

$options = getopt("", ["file:", "unique-combinations:"]);

if (!isset($options['file'])) {
    die("Please specify a file using --file option.");
}

$parser = new Parser();
try {
    $products = $parser->parse($options['file']);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

foreach ($products as $product) {
    print_r($product);
}

$combinations = UniqueCombinations::count($products);

$file = fopen($options['unique-combinations'], 'w');
fputcsv($file, ['brand_name', 'model_name', 'colour', 'capacity', 'network', 'grade', 'condition', 'count']);

foreach ($combinations as $combination) {
    fputcsv($file, $combination);
}

fclose($file);
