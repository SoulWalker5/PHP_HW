<?php

namespace Models;

abstract class Figure
{
    public function __construct()
    {
    }

    abstract function perimeter();
    abstract function square();
}