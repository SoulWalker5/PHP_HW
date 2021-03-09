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
}