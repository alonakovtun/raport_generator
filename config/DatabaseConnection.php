<?php

class DatabaseConnection
{
    protected static $instance;

    private static $dsn = 'mysql:host=localhost;dbname=wzorce_projekt';
    private static $username = 'root';
    private static $password = '';

    private function __construct() 
    {
        try {
            self::$instance = new PDO(self::$dsn, self::$username, self::$password);
        } catch (PDOException $e) {
            echo "DatabaseConnectionion failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            new DatabaseConnection();
        }

        return self::$instance;
    }
}