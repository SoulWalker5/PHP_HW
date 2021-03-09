<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
        ],
    ],
    "products" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "index",
        ],
    ],
    "export/(.*)" => [
        "GET" => [
            "controller" => "\\controllers\\ExportController",
            "action" => "export",
            "params" => "$1"
        ],
    ],
];