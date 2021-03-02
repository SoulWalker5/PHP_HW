<?php

require_once("ClassLoader.php");

ClassLoader::getInstance()->register();

$circle = new \Models\Circle(30);

echo $circle->square();

try {
    throw new Exception("Unexpected type of argument");
} catch (Exception $e) {
    Logger::getInstance()->log($e->getMessage(), Logger::WARNING, $e);
}

