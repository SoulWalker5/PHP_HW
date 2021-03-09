<?php

namespace Models;

class Rectangle extends Figure
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        parent::__construct();
        $this->width = $width;
        $this->height = $height;
    }

    function perimeter()
    {
        return ($this->width + $this->height) * 2;
    }

    function square()
    {
        return $this->width * $this->height;
    }
}