<?php
header("Content-Type: application/json"); // a aplicação retorna json
header("Access-Control-Allow-Origin: *"); // vai aceitar requisições de todas origens
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // habilita métodos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {

    $body = json_decode(file_get_contents("php://input")); // captura o body da requisicao

    $name = filter_var($body->name, FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_var($body->cpf, FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_var($body->type, FILTER_VALIDATE_INT);

    if (!$name || !$cpf || !$type) {
        echo json_encode(['error' => 'Preencha todas as informações para iniciar o atendimento']);
        exit;
    }

    $filaAtendimento = json_decode(file_get_contents('filaAtendimento.txt'));

    if ($type === 1) {
        array_push($filaAtendimento, ['name' => $name, 'cpf' => $cpf]);
    } else if ($type === 2) {
        array_unshift($filaAtendimento, ['name' => $name, 'cpf' => $cpf]);
    }

    file_put_contents('filaAtendimento.txt', json_encode($filaAtendimento));

    http_response_code(201);
    echo json_encode(['message' => 'Aguarde ser chamado por sua senha, no painel.']);
}
