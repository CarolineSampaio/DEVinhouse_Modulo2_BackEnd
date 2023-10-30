<?php

class Breed {
    private $id, $name, $created_at;

    public function __construct($name) {
        $this->name = $name;
    }

    public function insert() {
        $connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
        var_dump($connection);

        $sql = "INSERT INTO breeds (name) VALUES (:name_value)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":name_value", $this->name);

        $statement->execute();
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
