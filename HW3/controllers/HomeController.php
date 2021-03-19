<?php

namespace controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $this->returnView("index");
    }

    public function page404()
    {
        $this->returnView("404page");
    }

    public function problem()
    {
        $this->returnView("error");
    }
}