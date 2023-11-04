<?php
require_once '../config.php';
require_once '../controllers/PetController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new PetController();

if ($method === 'POST') {
    $controller->createOne();
} else if ($method === 'GET') {
    $controller->listAll();
}
