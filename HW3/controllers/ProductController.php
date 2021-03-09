<?php


namespace controllers;

use exceptions\ImportException;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadModel("product", "Product");

        try {
            $products = $this->product->getAll();
        } catch (ImportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
        }

        $this->data("products", $products);
        $this->data("template", "product/index");
        $this->returnView("/index");
    }


}