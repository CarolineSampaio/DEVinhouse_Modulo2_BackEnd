<?php
require_once 'config.php';
require_once 'utils.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $body = getBody();

    $guiche = filter_var($body->guiche, FILTER_VALIDATE_INT);

    if (!$guiche) {
        echo json_encode(['error' => 'Não foi enviado o Nº do guiche']);
        exit;
    }

    $fila = json_decode(file_get_contents(ARQUIVO_FILA_ATENDIMENTO));

    // pegar o primeiro item do array de fila e  exclui a pessoa do array de fila para que não seja chamado por outro atendente;
    if (count($fila) === 0) {
        http_response_code(204);
        exit;
    }

    $primeiroItem = array_shift($fila);

    // salvar o array fila no arquivo filaAtendimento.txt
    saveFileContent(ARQUIVO_FILA_ATENDIMENTO, $fila);

    // identificar qual é guiche  fazer um push do cliente retirado do array fila, colocando-o no txt do guiche correspondente
    if ($guiche === 1) {
        $listaGuiche1 = readFileContent(ARQUIVO_GUICHE_1);
        array_push($listaGuiche1, $primeiroItem);
        saveFileContent(ARQUIVO_GUICHE_1, $listaGuiche1);
    } else if ($guiche === 2) {
        $listaGuiche2 = readFileContent(ARQUIVO_GUICHE_2);
        array_push($listaGuiche2, $primeiroItem);
        saveFileContent(ARQUIVO_GUICHE_2, $listaGuiche2);
    } else if ($guiche === 3) {
        $listaGuiche3 = readFileContent(ARQUIVO_GUICHE_3);
        array_push($listaGuiche3, $primeiroItem);
        saveFileContent(ARQUIVO_GUICHE_3, $listaGuiche3);
    }

    http_response_code(201);
    echo json_encode(['current' => $primeiroItem]);
}
