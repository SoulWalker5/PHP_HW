<?php

require_once("ClassLoader.php");

ClassLoader::getInstance()->register();
ClassLoader::getInstance()->load("functions");
ClassLoader::getInstance()->load("Exceptions/ArgumentNullException");

try {
    echo \functions\exponentiation(2,null) . "\n";
} catch (ArgumentNullException $e){
    echo 'An exception thrown : ',  $e->getMessage(), "\n";
}
