<?php

class BreedDAO {
    private $connection;

    public function __construct() {
        $this->connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
    }

    public function insert(Breed $breed) {
        try {
            $sql = "INSERT INTO breeds (name) VALUES (:name_value)";

            $statement = ($this->getConnection())->prepare($sql);
            $statement->bindValue(":name_value", $breed->getName());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            return ['success' => false];
        }
    }

    public function findMany() {
        $sql = "SELECT * FROM breeds";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getConnection() {
        return $this->connection;
    }
}
