<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
        ],
    ],
    "page404" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "page404",
        ],
    ],
    "problem" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "problem",
        ],
    ],
    "login" => [
        "GET" => [
            "controller" => "\\controllers\\AuthController",
            "action" => "getLoginPage",
        ],
        "POST" => [
            "controller" => "\\controllers\\AuthController",
            "action" => "login",
        ],
    ],
    "logout" => [
        "GET" => [
            "controller" => "\\controllers\\AuthController",
            "action" => "logout",
        ],
    ],
    "register" => [
        "GET" => [
            "controller" => "\\controllers\\AuthController",
            "action" => "register",
        ],
        "POST" => [
            "controller" => "\\controllers\\UserController",
            "action" => "create",
        ],
    ],
    "products" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "index",
        ],
    ],
    "product/create" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "getCreatePage",
        ],
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "create",
        ],
    ],
    "product/delete/(\d{1,6})" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "getDeletePage",
            "params" => "$1"
        ],
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "delete",
            "params" => "$1"
        ],
    ],
    "product/update/(\d{1,6})" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "getUpdatePage",
            "params" => "$1"
        ],
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "update",
            "params" => "$1"
        ],
    ],
    "product/details/(\d{1,6})" => [
        "GET" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "find",
            "params" => "$1"
        ],
    ],
    "users" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "index",
        ],
    ],
    "user/details/(\d{1,6})" => [
        "GET" => [
            "controller" => "\\controllers\\UserController",
            "action" => "find",
            "params" => "$1"
        ],
    ],
    "cart" => [
        "GET" => [
            "controller" => "\\controllers\\CartController",
            "action" => "index",
        ],
        "POST" => [
            "controller" => "\\controllers\\OrderController",
            "action" => "create",
        ],
    ],
    "cart/add" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "add",
        ],
    ],
    "cart/less" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "lessQuantity",
        ],
    ],
    "cart/more" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "moreQuantity",
        ],
    ],
    "cart/setQuantity" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "setQuantity",
        ],
    ],
    "cart/delete(\d{1,6})" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "delete",
            "params" => "$1"
        ],
    ],
    "checkout" => [
        "POST" => [
            "controller" => "\\controllers\\OrderController",
            "action" => "createOrder",
        ],
    ],
    "orders" => [
        "GET" => [
            "controller" => "\\controllers\\OrderController",
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
    "ajax/addtocart" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "addAction",
        ],
    ],
    "ajax/create" => [
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "createAction",
        ],
    ],
    "ajax/edit" => [
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "editAction",
        ],
    ],
    "ajax/delete" => [
        "POST" => [
            "controller" => "\\controllers\\ProductController",
            "action" => "deleteAction",
        ],
    ],
    "ajax/makeorder" => [
        "POST" => [
            "controller" => "\\controllers\\OrderController",
            "action" => "makeOrderAction",
        ],
    ],
    "ajax/setquantity" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "setQuantityAction",
        ],
    ],
    "ajax/deletefromcart" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "deleteAction",
        ],
    ],
    "ajax/lessquantity" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "lessQuantityAction",
        ],
    ],"ajax/morequantity" => [
        "POST" => [
            "controller" => "\\controllers\\CartController",
            "action" => "moreQuantityAction",
        ],
    ],
];