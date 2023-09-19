<?php

require_once 'Product.php';

class Parser {

    /**
     * @throws Exception
     * @return Product[]
     */
    public function parse($file): array
    {
        $filename = $file['name'];
        $path = $file['tmp_name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);


        switch ($extension) {
            case 'csv':
                return $this->parseCSV($path);
            case 'tsv':
                return $this->parseTSV($path);
            case 'json':
                return $this->parseJSON($path);
            case 'xml':
                return $this->parseXML($path);
            default:
                throw new Exception("Unsupported file format: $extension");
        }
    }

    private function parseCSV($filename): array
    {
        $handle = fopen($filename, 'r');
        $header = fgetcsv($handle);
        $products = [];
        while (($data = fgetcsv($handle)) !== false) {
            $products[] = new Product(array_combine($header, $data));
        }
        fclose($handle);
        return $products;
    }

    private function parseTSV($filename): array
    {
        $handle = fopen($filename, 'r');
        $header = fgetcsv($handle, 0, "\t");
        $products = [];
        while (($data = fgetcsv($handle, 0, "\t")) !== false) {
            $products[] = new Product(array_combine($header, $data));
        }
        fclose($handle);
        return $products;
    }

    private function parseJSON($filename): array
    {
        $data = file_get_contents($filename);
        $array = json_decode($data, true);
        $products = [];
        foreach ($array as $item) {
            $products[] = new Product($item);
        }
        return $products;
    }

    private function parseXML($filename): array
    {
        $xml = simplexml_load_file($filename);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $products = [];
        foreach ($array as $item) {
            $products[] = new Product($item);
        }
        return $products;
    }
}
