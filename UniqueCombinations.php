<?php

class UniqueCombinations {
    public static function count($products): array
    {
        $combinations = [];

        foreach ($products as $product) {
            // this key is a string that uniquely identifies a product
            $key = $product->brand . $product->model . $product->condition . $product->grade . $product->gb_spec . $product->colour . $product->network;
            
            if (!isset($combinations[$key])) {
                // if this is the first time we've seen this product, add it to the array
                $combinations[$key] = [
                    'brand' => $product->brand,
                    'model' => $product->model,
                    'condition' => $product->condition,
                    'grade' => $product->grade,
                    'gb_spec' => $product->gb_spec,
                    'colour' => $product->colour,
                    'network' => $product->network,
                    'count' => 0
                ];
            }

            // increment the count for this product
            $combinations[$key]['count']++;
        }

        // return the array of unique combinations
        return $combinations;
    }
}
