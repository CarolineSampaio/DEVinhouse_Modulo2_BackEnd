<?php
//constantes
define('TAXA', 1.5);

//configurações gerais
header("Content-Type: application/json"); // a aplicação retorna json
header("Access-Control-Allow-Origin: *"); // vai aceitar requisições de todas origens
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // habilita métodos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

//verifica qual o método recebido
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {

    $body = file_get_contents("php://input"); // body em formato de string
    $data = json_decode($body); // converte para um array php

    $nome = filter_var($data->nome, FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_var($data->idade, FILTER_VALIDATE_INT);
    $curso = filter_var($data->curso, FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_var($data->valor, FILTER_VALIDATE_FLOAT);
    $prazo = filter_var($data->prazo, FILTER_VALIDATE_INT);

    if (!$nome) {
        http_response_code(400);
        echo json_encode(['error' => 'nome é obrigatório']);
        exit;
    }

    if (!$idade) {
        http_response_code(400);
        echo json_encode(['error' => 'idade é obrigatório']);
        exit;
    }

    if (!$curso) {
        http_response_code(400);
        echo json_encode(['error' => 'curso é obrigatório']);
        exit;
    }

    if (!$valor) {
        http_response_code(400);
        echo json_encode(['error' => 'valor é obrigatório']);
        exit;
    }

    if (!$prazo) {
        http_response_code(400);
        echo json_encode(['error' => 'prazo é obrigatório']);
        exit;
    }

    if ($idade < 18) {
        http_response_code(403);
        echo json_encode(['error' => 'Não permitido empréstimo para menor de idade.']);
        exit;
    }

    $taxa = ($idade < 25) ? 0.01 : TAXA / 100; // taxa de juros decimal
    $juros = $valor * $taxa * $prazo; // calculo do juros simples
    $montante = $valor + $juros;
    $parcela = $montante / $prazo;

    // verifica se o cliente já possui um empréstimo se um arquivo com o nome dele .txt existir
    if (file_exists("$nome.txt")) {
        http_response_code(409);
        echo json_encode(['error' => 'Já existe um emprestimo em seu nome']);
        exit;
    }
    // cria um arquivo txt com o nome do cliente
    file_put_contents("$nome.txt", "Nome: $nome \nIdade: $idade \nJuros: $juros \nParcela: $parcela");

    // API retorna:
    http_response_code(201);
    echo json_encode([
        'nome' => $nome,
        'juros do empréstimo' => number_format($juros, 2),
        'Valor total' => number_format($montante, 2),
        'parcela mensal' => number_format($parcela, 2)
    ]);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Essa operação não é permitida']);
}
