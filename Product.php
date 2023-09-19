<?php

class Product {
    public $brand;
    public $model;
    public $condition;
    public $grade;
    public $gb_spec;
    public $colour;
    public $network;

    /**
     * @throws Exception
     * @param array $data
     * @return void
     */
    public function __construct($data) {
        if (!isset($data['brand_name']) || !isset($data['model_name'])) {
            throw new Exception("Required fields 'make' and 'model' are missing.");
        }
        
        $this->brand = $data['brand_name'];
        $this->model = $data['model_name'];
        $this->condition = $data['condition_name'] ?? null;
        $this->grade = $data['grade_name'] ?? null;
        $this->gb_spec = $data['gb_spec_name'] ?? null;
        $this->colour = $data['colour_name'] ?? null;
        $this->network = $data['network_name'] ?? null;
    }
}
