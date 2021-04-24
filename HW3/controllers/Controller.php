<?php

namespace controllers;

use \configs\Consts;

class Controller
{

    private $data = [];

    public function __construct()
    {
    }

    public function loadService($alias, $title)
    {
        $service = "\\services\\" . $title;
        $this->$alias = new $service();
    }

    public function loadModel($alias, $title)
    {
        $model = "\\models\\" . $title;
        $this->$alias = new $model();
    }

    public function data($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function returnView($viewTitle)
    {
        $path = Consts::DOCUMENT_ROOT . "/views/" . $viewTitle . ".php";
        if (file_exists($path)) {
            \extract($this->data);
            require_once($path);
        }
    }

    protected function response($data, $status = 500) {
        header("HTTP/1.0 " . $status . " " . $this->requestStatus($status));
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }

    private function requestStatus($code) {
        $status = array(
            200 => 'OK',
            400 => 'Error',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }

    public function redirectTo($route)
    {
        header("Location: $route");
        exit();
    }
}