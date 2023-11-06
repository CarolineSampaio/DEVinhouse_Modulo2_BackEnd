<?php
require_once 'Database.php';

class PlaceDAO extends Database {
    public function insert(Place $place) {
        try {
            $sql = "INSERT INTO places 
            (
                name, 
                contact, 
                opening_hours, 
                description, 
                latitude, 
                longitude
            ) 
            VALUES 
            (
                :name, 
                :contact, 
                :opening_hours, 
                :description, 
                :latitude, 
                :longitude
            )";

            $statement = ($this->getConnection())->prepare($sql);

            $statement->bindValue(':name', $place->getName());
            $statement->bindValue(':contact', $place->getContact());
            $statement->bindValue(':opening_hours', $place->getOpeningHours());
            $statement->bindValue(':description', $place->getDescription());
            $statement->bindValue(':latitude', $place->getLatitude());
            $statement->bindValue(':longitude', $place->getLongitude());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }

    public function findMany() {
        $sql = "SELECT * FROM places order by name";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findOne($id) {
        $sql = "SELECT * FROM places WHERE id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(':id_value', $id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM places WHERE id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(':id_value', $id);
        $statement->execute();
    }

    public function update($id, $data) {
        $placeInDatabase = $this->findOne($id);

        $sql = "UPDATE places SET 
            name = :name, 
            contact = :contact, 
            opening_hours = :opening_hours, 
            description = :description, 
            latitude = :latitude, 
            longitude = :longitude
            WHERE id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);

        $statement->bindValue(":name", isset($data->name) ? $data->name : $placeInDatabase['name']);
        $statement->bindValue(":contact", isset($data->contact) ? $data->contact : $placeInDatabase['contact']);
        $statement->bindValue(":opening_hours", isset($data->opening_hours) ? $data->opening_hours : $placeInDatabase['opening_hours']);
        $statement->bindValue(":description", isset($data->description) ? $data->description : $placeInDatabase['description']);
        $statement->bindValue(":latitude", isset($data->latitude) ? $data->latitude : $placeInDatabase['latitude']);
        $statement->bindValue(":longitude", isset($data->longitude) ? $data->longitude : $placeInDatabase['longitude']);
        $statement->bindValue(":id_value", $id);

        $statement->execute();

        return ['success' => true];
    }
}
