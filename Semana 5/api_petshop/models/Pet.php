<?php

class Pet {
    private $id, $breed_id, $name, $age, $weight, $size, $created_at, $connection;

    public function __construct($breed_id = null, $name = null) {
        $this->breed_id = $breed_id;
        $this->name = $name;
        $this->connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
    }

    public function insert() {
        try {
            $sql = "INSERT INTO pets 
            (
                breed_id, 
                name, 
                age, 
                weight, 
                size
            ) 
            VALUES 
            (
                :breed_id_value, 
                :name_value, 
                :age_value, 
                :weight_value, 
                :size_value
            )";

            $statement = $this->getConnection()->prepare($sql);

            $statement->bindValue(":breed_id_value", $this->getBreedId());
            $statement->bindValue(":name_value", $this->getName());
            $statement->bindValue(":age_value", $this->getAge());
            $statement->bindValue(":weight_value", $this->getWeight());
            $statement->bindValue(":size_value", $this->getSize());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false];
        }
    }

    public function findMany() {
        try {
            $sql = "SELECT 
                pets.id,
                pets.name,
                size,
                breeds.name as breed_name
                    FROM pets 
                        JOIN breeds on pets.breed_id = breeds.id
                        order by size DESC";

            $statement = $this->getConnection()->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
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

    public function getBreedId() {
        return $this->breed_id;
    }
    public function setBreedId($breed_id) {
        $this->breed_id = $breed_id;
    }

    public function getAge() {
        return $this->age;
    }
    public function setAge($age) {
        $this->age = $age;
    }

    public function getWeight() {
        return $this->weight;
    }
    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getSize() {
        return $this->size;
    }
    public function setSize($size) {
        $this->size = $size;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getConnection() {
        return $this->connection;
    }
}
