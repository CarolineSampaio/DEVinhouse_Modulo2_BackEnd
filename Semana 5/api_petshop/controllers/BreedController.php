<?php
require_once '../utils.php';
require_once '../models/Breed.php';

class BreedController {
    public function createOne() {
        $body = getBody();

        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name) responseError('O nome da raça é obrigatório. ', 400);

        $breed = new Breed($name);

        $breed->insert();
    }
}
