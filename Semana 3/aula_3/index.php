<?php
require_once 'utils.php';
require_once 'DragonController.php';

$method = $_SERVER['REQUEST_METHOD'];

$controller = new DragonController();

if ($method === 'POST') {
    $body = getBody();
    $controller->create($body);
} else if($method === "GET") {
    $controller->list();
}