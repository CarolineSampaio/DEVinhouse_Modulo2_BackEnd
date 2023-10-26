<?php
require_once 'Enemy.php';

class Dragon extends Enemy {

    private $power;

    public function __construct() {
        parent::__construct("Dragon");
    }

    public function save(){
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'damage' => $this->damage,
            'defese' => $this->defese,
            'life' => $this->life
        ];

        $allData = readFileContent('dragoes.txt');
        array_push($allData, $data);
        saveFileContent('dragoes.txt', $allData);

        return true;
    }
    

    public function list() {
        $allData = readFileContent('dragoes.txt');
        return $allData;
    }

    public function atacar() {
        echo "Atacando com fogo";
    }


}