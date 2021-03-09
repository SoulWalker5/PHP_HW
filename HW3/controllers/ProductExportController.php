<?php


namespace controllers;

use exceptions\ExportException;
use exceptions\ImportException;

class ProductExportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export($expFormat)
    {
        $this->loadModel("product", "Product");
        $this->loadModel("productExport", "ProductExport");

        try {
            $products = $this->product->getAll();
        } catch (ImportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
        }

        $calledMethode = "export" . mb_strtoupper($expFormat);

        try {
            $exportedFileName = $this->productExport->$calledMethode($products);
        } catch (ExportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
        }

        $this->data("export", $exportedFileName);
        $this->data("template", "product/export");
        $this->returnView("/index");
    }

}