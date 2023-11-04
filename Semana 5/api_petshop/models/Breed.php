<?php

class Breed {
    private $id, $name, $created_at;

    public function __construct($name = null) {
        $this->name = $name;
    }

    public function insert() {
        try {
            $connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");

            $sql = "INSERT INTO breeds (name) VALUES (:name_value)";

            $statement = $connection->prepare($sql);
            $statement->bindValue(":name_value", $this->getName());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            return ['success' => false];
        }
    }

    public function findMany() {
        try {
            $connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");

            $sql = "SELECT * FROM breeds";

            $statement = $connection->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $error) {
            return ['success' => false];
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
