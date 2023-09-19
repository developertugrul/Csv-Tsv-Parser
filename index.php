<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    require_once 'Parser.php';
    require_once 'UniqueCombinations.php';

    $parser = new Parser();
    try {
        $products = $parser->parse($_FILES['file']);
    } catch (Exception $e) {
        echo $e->getMessage();
        die;
    }

    $combinations = UniqueCombinations::count($products);
    $outputFile = 'output.csv';
    $file = fopen($outputFile, 'w');
    fputcsv($file, ['make', 'model', 'condition', 'grade', 'capacity', 'colour', 'network', 'count']);
    foreach ($combinations as $combination) {
        fputcsv($file, $combination);
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Parser</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
        }
        form {
            background: #fefefe;
            min-height: 5rem;
            border: 1px solid lightgray;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            min-width: 25rem;
            margin-top: 5rem;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload and Parse">
    </form>

    <?php if (isset($outputFile)): ?>
        <p>Unique combinations have been saved to <a href="<?= $outputFile ?>">output.csv</a></p>
    <?php endif; ?>
</body>
</html>
