<?php
// Configurações gerais
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD']; // captura o método que chegou

if ($method === 'GET') {
    $text = file_get_contents('database.txt');
    $data =  json_decode($text);

    // var_dump($data[0]);
    echo json_encode(['products' => $data]);
} else if ($method === "POST") {
    $body = file_get_contents("php://input");
    $data = json_decode($body); // acesso ao body da requisicao

    if (isset($data->nome) === false || empty($data->nome)) {
        http_response_code(400);
        echo json_encode(['error' => 'O nome é obrigatório']);
        exit;
    }

    // ler arquivo
    $text = file_get_contents('database.txt'); // "[]"
    $arrayItems = json_decode($text); // []

    $arrayItems[] = $data;

    file_put_contents('database.txt', json_encode($arrayItems));

    http_response_code(201);
    echo json_encode(['message' => 'Recebi um post']);
}
