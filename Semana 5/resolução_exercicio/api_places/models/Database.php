<?php

class Database {
    private $host = 'localhost';
    private $username = 'bolivia_places';
    private $password = 'bolivia';
    private $dbname = 'api_places';

    private $connection;

    public function __construct() {
        $this->connection = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }

    public function getConnection() {
        return $this->connection;
    }
}
