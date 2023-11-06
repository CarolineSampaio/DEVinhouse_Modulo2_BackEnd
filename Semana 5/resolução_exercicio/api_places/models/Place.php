<?php
require_once '../config.php';
require_once '../utils.php';

class Place {
    private $id, $name, $contact, $openingHours, $description, $latitude, $longitude;

    public function __construct($name) {
        $this->name = $name;
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

    public function getContact() {
        return $this->contact;
    }
    public function setContact($contact) {
        $this->contact = $contact;
    }

    public function getOpeningHours() {
        return $this->openingHours;
    }
    public function setOpeningHours($openingHours) {
        $this->openingHours = $openingHours;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getLatitude() {
        return $this->latitude;
    }
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
}
