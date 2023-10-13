<?php
require_once 'utils.php';
require_once 'Dragon.php';

class DragonController {
    function create($body) {
        // Capturei o body
        $name =  sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $life = sanitizeInput($body, 'life', FILTER_VALIDATE_FLOAT);
        $damage = sanitizeInput($body, 'damage', FILTER_VALIDATE_FLOAT);
        $defese = sanitizeInput($body, 'defese', FILTER_VALIDATE_FLOAT);
        $level = sanitizeInput($body, 'level', FILTER_VALIDATE_INT);

        if (!$name) responseError("O nome é obrigatório", 400);
        if (!$life) responseError("A vida é obrigatória", 400);
        if (!$damage) responseError("O dano é obrigatório", 400);
        if (!$defese) responseError("A defesa é obrigatória", 400);
        if (!$level) responseError("O nível é obrigatório", 400);

        $dragon = new Dragon();
        $dragon->setName($name);
        $dragon->setLife($life);
        $dragon->setDamage($damage);
        $dragon->setDefese($defese);
        $dragon->setLevel($level);

        if ($dragon->save()) {
            response(["message" => "Dragão cadastrado com sucesso"], 201);
        } else {
            responseError("Falha ao salva o dragão", 400);
        }
    }

    function list() {
        $list = (new Dragon())->list();
        response($list, 200);
    }
}
