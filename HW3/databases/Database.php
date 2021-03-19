<?php

namespace databases;

use Logger;
use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $connection;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        if (!$this->connection) {

            $params = require_once("configs/db_param.php");

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

            try {
                $this->connection = new PDO($dsn, $params['user'], $params['password']);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
            }
        }

        return $this->connection;
    }

    private function __sleep()
    {

    }

    private function __wakeup()
    {

    }
}