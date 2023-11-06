<?php

class Pet {
    private $id, $breed_id, $name, $age, $weight, $size, $created_at;

    public function __construct($breed_id, $name) {
        $this->breed_id = $breed_id;
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
}
