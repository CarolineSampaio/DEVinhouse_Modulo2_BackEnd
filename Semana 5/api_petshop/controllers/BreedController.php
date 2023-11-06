<?php
require_once '../utils.php';
require_once '../models/Breed.php';
require_once '../models/BreedDAO.php';

class BreedController {
    public function createOne() {
        $body = getBody();

        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name) responseError('O nome da raça é obrigatório. ', 400);

        $breed = new Breed($name);

        $breedDAO = new BreedDAO();
        $result = $breedDAO->insert($breed);

        if ($result['success'] === true) {
            response(["message" => "Cadastrado com sucesso"], 201);
        } else {
            responseError("Houve um erro ao inserir a raça.", 400);
        }
    }

    public function listAll() {
        $breedDAO = new BreedDAO();
        $breeds = $breedDAO->findMany();
        response($breeds, 200);
    }
}
