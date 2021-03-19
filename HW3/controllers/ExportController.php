<?php


namespace controllers;

use exceptions\ExportException;
use exceptions\ImportException;
use Logger;
use PDOException;
use repositories\ProductRepository;

class ExportController extends Controller
{
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new ProductRepository();

        if(isset($_SESSION["loggedUser"]) && $_SESSION["role"] == 'admin'){
            $this->redirectTo('/');
        }
    }

    public function export($expFormat)
    {
        try {
            $products = $this->repository->getAll();
        } catch (PDOException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

            $this->redirectTo('problem');
        }

        $service = mb_strtoupper($expFormat) . "ExportService";
        $this->loadService("$service", "$service");

        try {
            $exportedFileName = $this->$service->export($products);
        } catch (ExportException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

            $this->redirectTo('problem');
        }

        $this->data("export", $exportedFileName);
        $this->data("template", "product/export");
        $this->returnView("/index");
    }
}