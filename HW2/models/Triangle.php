<?php

namespace Models;

class Triangle extends Figure
{
    private $leg1;
    private $leg2;
    private $hypotenuse;

    public function __construct(float $leg1, float $leg2, float $hypotenuse)
    {
        parent::__construct();
        $this->leg1 = $leg1;
        $this->leg2 = $leg2;
        $this->hypotenuse = $hypotenuse;
    }

    function perimeter()
    {
        return $this->leg1 + $this->leg2 + $this->hypotenuse;
    }

    function square()
    {
        return 2 * sin($this->leg1) * sin($this->leg2) * sin($this->hypotenuse);
    }
}