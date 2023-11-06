<?php
require_once '../utils.php';
require_once '../models/Pet.php';
require_once '../models/PetDAO.php';

class PetController {
    public function createOne() {
        $body = getBody();

        $breed_id = sanitizeInput($body, 'breed_id', FILTER_VALIDATE_INT);
        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $age = sanitizeInput($body, 'age', FILTER_VALIDATE_INT);
        $weight = sanitizeInput($body, 'weight', FILTER_VALIDATE_FLOAT);
        $size = strtoupper(sanitizeInput($body, 'size', FILTER_SANITIZE_SPECIAL_CHARS));

        if (!$breed_id) responseError('O id da raça é obrigatório. ', 400);
        if (!$name) responseError('O nome do pet é obrigatório. ', 400);
        if (
            $size &&
            !($size === 'PEQUENO' ||
                $size === 'MEDIO' ||
                $size === 'GRANDE' ||
                $size === 'GIGANTE')
        ) {
            responseError('O tamanho inserido é inválido. ', 400);
        }
        $pet = new Pet($breed_id, $name);

        if ($age) $pet->setAge($age);
        if ($weight) $pet->setWeight($weight);
        if ($size) $pet->setSize($size);

        $petDAO = new PetDAO();
        $result = $petDAO->insert($pet);

        if ($result['success'] === true) {
            response(["message" => "Pet cadastrado com sucesso."], 201);
        } else {
            responseError("Houve um erro ao inserir o pet.", 400);
        }
    }

    public function listAll() {
        $petDAO = new PetDAO();
        $pets = $petDAO->findMany();
        response($pets, 200);
    }

    public function listOne() {
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);

        if (!$id) responseError('O id inserido é inválido. ', 400);

        $petDAO = new PetDAO();
        $result = $petDAO->findOne($id);

        if (!$result) responseError('Pet não encontrado. ', 404);
        response($result, 200);
    }

    public function deleteOne() {
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);

        if (!$id) responseError('O id inserido é inválido. ', 400);

        $petDAO = new PetDAO();
        $petExists = $petDAO->findOne($id);

        if (!$petExists) responseError('Pet não encontrado. ', 404);

        $result = $petDAO->deleteOne($id);

        if ($result['success'] === true) {
            response(["message" => "Pet deletado com sucesso."], 204);
        } else {
            responseError("Houve um erro ao deletar o pet.", 400);
        }
    }

    public function updateOne() {
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);
        $body = getBody();

        if (!$id) responseError('ID ausente ou inválido. ', 400);

        if (isset($body->name) && empty($body->name)) responseError('O nome do pet é obrigatório. ', 400);

        if (isset($body->race_id) && empty($body->race_id)) responseError('O id da raça é obrigatório. ', 400);

        if (
            isset($body->size) && !($body->size === 'PEQUENO' ||
                $body->size === 'MEDIO' ||
                $body->size === 'GRANDE' ||
                $body->size === 'GIGANTE')
        ) {
            responseError('O tamanho inserido é inválido. ', 400);
        }

        $petDAO = new PetDAO();

        $result = $petDAO->updateOne($id, $body);


        if ($result['success'] === true) {
            response([], 200);
        } else {
            responseError("Não foi possível atualizar o item.", 400);
        }
    }
}
