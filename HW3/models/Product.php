<?php


namespace models;


use exceptions\ImportException;
use interfaces\ProductInterface;

class Product implements ProductInterface
{
    public function getAll()
    {
        if (($handle = fopen("testDatabase.csv", "r")) !== FALSE) {

            $attributes = fgetcsv($handle, 0, ';');
            $products = array();
            $i = 0;

            while (($row = fgetcsv($handle, 0, ";")) !== FALSE) {
                $products[$i] = array_combine($attributes, $row);
                $i++;
            }
        }
        fclose($handle);


        if (!isset($products)) {
            throw new ImportException("Import was unsuccessfully");
        }

        return $products;
    }
}
