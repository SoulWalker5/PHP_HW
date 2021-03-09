<?php

namespace Models;

class Circle extends Figure
{
    private $radius;

    public function __construct(float $radius)
    {
        parent::__construct();
        $this->radius = $radius;
    }

    function perimeter()
    {
        return 2 * M_PI * $this->radius;
    }

    function square()
    {
        return M_PI * pow($this->radius, 2);
    }
}
