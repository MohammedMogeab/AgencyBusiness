<?php

namespace Core;

class Database
{
    private $connection;
    private static $instance = null;

    private function __construct()
    {
        $host = 'localhost';
        $dbname = 'agency_business';
        $username = 'root';
        $password = '';

        try {
            $this->connection = new \PDO(
                "mysql:host={$host};dbname={$dbname}",
                $username,
                $password
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
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
        return $this->connection;
    }
} 