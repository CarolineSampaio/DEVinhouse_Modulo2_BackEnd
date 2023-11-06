<?php

class Breed {
    private $id, $name, $created_at;

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

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
