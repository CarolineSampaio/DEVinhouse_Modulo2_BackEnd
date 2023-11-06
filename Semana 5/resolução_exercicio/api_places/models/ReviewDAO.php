<?php
require_once 'Database.php';

class ReviewDAO extends Database {
    public function insert(Review $review) {
        try {
            $sql = "INSERT INTO reviews 
            (
                name, 
                email, 
                stars, 
                date, 
                status, 
                place_id
            )
            VALUES 
            (
                :name, 
                :email, 
                :stars, 
                :date, 
                :status, 
                :place_id
            )";

            $statement = ($this->getConnection())->prepare($sql);

            $statement->bindValue(':name', $review->getName());
            $statement->bindValue(':email', $review->getEmail());
            $statement->bindValue(':stars', $review->getStars());
            $statement->bindValue(':date', $review->getDate());
            $statement->bindValue(':status', $review->getStatus());
            $statement->bindValue(':place_id', $review->getPlaceId());

            $statement->execute();


            return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }

    public function list($place_id) {
        $sql = "SELECT * from reviews where place_id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(":id_value", $place_id);
        $statement->execute();

        $result = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $status) {
        $sql = "UPDATE reviews SET status = :status WHERE id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(":status", $status);
        $statement->bindValue(":id_value", $id);
        $statement->execute();
    }
}
