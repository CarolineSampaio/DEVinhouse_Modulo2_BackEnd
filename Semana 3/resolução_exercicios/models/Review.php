<?php
require_once 'config.php';
require_once 'utils.php';
date_default_timezone_set('America/Sao_Paulo');

class Review {
    private $id, $name, $email, $stars, $date, $status, $place_id;

    public function __construct($place_id = null) {
        $this->id = uniqid();
        $this->place_id = $place_id;
        $this->date = (new DateTime())->format('d/m/Y H:i');
        $this->status = 'PENDENTE';
    }

    public function save() {
        $data = [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'stars' => $this->getStars(),
            'status' => $this->getStatus(),
            'date' => $this->getDate(),
            'place_id' => $this->getPlaceId()
        ];

        $allData = readFileContent(FILE_REVIEWS);
        array_push($allData,  $data);
        saveFileContent(FILE_REVIEWS, $allData);
    }

    public function list() {
        $allData = readFileContent(FILE_REVIEWS);

        $filtered = array_values(array_filter($allData, function ($review) {
            return $review->place_id === $this->getPlaceId();
        }));

        return $filtered;
    }

    public function updateStatus($id, $status) {
        $allData  = readFileContent(FILE_REVIEWS);
        foreach ($allData  as $review) {
            if ($review->id === $id) {
                $review->status = $status;
                saveFileContent(FILE_REVIEWS, $allData);
                return;
            }
        }
        responseError('Avaliação não encontrada.', 404);
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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getStars() {
        return $this->stars;
    }

    public function setStars($stars) {
        $this->stars = $stars;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getPlaceId() {
        return $this->place_id;
    }
}
