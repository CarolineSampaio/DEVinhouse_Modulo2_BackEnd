<?php
require_once '../utils.php';
require_once '../models/Pet.php';

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

        $result = $pet->insert();

        if ($result['success'] === true) {
            response(["message" => "Pet cadastrado com sucesso."], 201);
        } else {
            responseError("Houve um erro ao inserir o pet.", 400);
        }
    }

    public function listAll() {
        $pet = new Pet();
        $pets = $pet->findMany();
        response($pets, 200);
    }
}
