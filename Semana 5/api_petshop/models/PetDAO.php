<?php

class PetDAO {
    private $connection;

    public function __construct() {
        $this->connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
    }

    public function insert(PET $pet) {
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

            $statement = ($this->getConnection())->prepare($sql);

            $statement->bindValue(":breed_id_value", $pet->getBreedId());
            $statement->bindValue(":name_value", $pet->getName());
            $statement->bindValue(":age_value", $pet->getAge());
            $statement->bindValue(":weight_value", $pet->getWeight());
            $statement->bindValue(":size_value", $pet->getSize());

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
                        order by name ASC";

            $statement = ($this->getConnection())->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return ['success' => false];
        }
    }

    public function findOne($id) {
        $sql = "SELECT * FROM pets WHERE pets.id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(":id_value", $id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function deleteOne($id) {
        try {
            $sql = "DELETE FROM pets WHERE pets.id = :id_value";

            $statement = ($this->getConnection())->prepare($sql);
            $statement->bindValue(":id_value", $id);
            $statement->execute();

            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false];
        }
    }

    public function updateOne($id, $data) {
        $petInDatabase = $this->findOne($id);

        $sql = "UPDATE pets SET 
            breed_id = :breed_id_value, 
            name = :name_value, 
            age = :age_value, 
            weight = :weight_value, 
            size = :size_value
        WHERE pets.id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);

        $statement->bindValue(":breed_id_value", isset($data->breed_id) ? $data->breed_id : $petInDatabase['breed_id']);
        $statement->bindValue(":name_value", isset($data->name) ? $data->name : $petInDatabase['name']);
        $statement->bindValue(":age_value", isset($data->age) ? $data->age : $petInDatabase['age']);
        $statement->bindValue(":weight_value", isset($data->weight) ? $data->weight : $petInDatabase['weight']);
        $statement->bindValue(":size_value", isset($data->size) ? $data->size : $petInDatabase['size']);
        $statement->bindValue(":id_value", $id);
        $statement->execute();

        return ['success' => true];
    }

    public function dashboard() {
        $sql = "SELECT SIZE, COUNT(SIZE) FROM pets 
        GROUP BY SIZE 
        ORDER BY COUNT(SIZE) DESC";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection() {
        return $this->connection;
    }
}
