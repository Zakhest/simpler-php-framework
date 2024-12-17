<?php

class Database {
    private $connection;

    public function __construct() {
        $config = include __DIR__ . '/../app/config/database.php';
        $this->connection = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database']
        );

        if ($this->connection->connect_error) {
            ErrorHandler::handle("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);
        if (!$result) {
            ErrorHandler::handle("Query error: " . $this->connection->error);
        }
        return $result;
    }

    public function escape($value) {
        return $this->connection->real_escape_string($value);
    }
}
