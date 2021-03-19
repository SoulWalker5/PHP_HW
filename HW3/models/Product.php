<?php


namespace models;

use exceptions\ImportException;
use interfaces\ProductInterface;

class Product
{
    private $title;
    private $price;
    private $amount;
    private $description;

    public function __construct($title, $price, $amount, $description)
    {
        $this->title = $title;
        $this->price = $price;
        $this->amount = $amount;
        $this->description = $description;
    }


    public function getData()
    {
        return ['title' => $this->title, 'price' => $this->price, 'amount' => $this->amount, 'description' => $this->description];
    }
//    public function getAll()
//    {
//        if (($handle = fopen("testDatabase.csv", "r")) !== FALSE) {
//
//            $attributes = fgetcsv($handle, 0, ';');
//            $products = array();
//            $i = 0;
//
//            while (($row = fgetcsv($handle, 0, ";")) !== FALSE) {
//                $products[$i] = array_combine($attributes, $row);
//                $i++;
//            }
//        }
//        fclose($handle);
//
//
//        if (!isset($products)) {
//            throw new ImportException("Import was unsuccessfully");
//        }
//
//        return $products;
//    }
}
