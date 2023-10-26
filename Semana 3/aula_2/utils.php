<?php

function getBody() {
    return json_decode(file_get_contents("php://input")); //pega o body no formato de string
}

function readFileContent($fileName) {
    return json_decode(file_get_contents($fileName));
}

function saveFileContent($fileName, $content) {
    file_put_contents($fileName, json_encode($content, JSON_PRETTY_PRINT));
}

function sanitizeString($value) {
    return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
}

function responseError($message, $status) {
    http_response_code($status);
    echo json_encode(['error' => $message]);
    exit;
}

function response($response, $status) {
    http_response_code($status);
    echo json_encode($response);
    exit;
}

function debug($conteudo) {
    echo '<pre>';
    echo var_dump($conteudo);
    echo '</pre>';;
}
