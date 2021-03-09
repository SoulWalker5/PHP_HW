<?php


namespace controllers;

use exceptions\ExportException;
use exceptions\ImportException;

class ExportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export($expFormat)
    {
        $this->loadModel("product", "Product");

        try {
            $products = $this->product->getAll();
        } catch (ImportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
        }

        $service = mb_strtoupper($expFormat) . "ExportService";
        $this->loadService("$service", "$service");

        try {
            $exportedFileName = $this->$service->export($products);
        } catch (ExportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
        }

        $this->data("export", $exportedFileName);
        $this->data("template", "product/export");
        $this->returnView("/index");
    }
}