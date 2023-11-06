<?php
require_once '../config.php';
require_once '../controllers/BreedController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new BreedController();

if ($method === 'POST') {
    $controller->createOne();
} else if ($method === 'GET') {
    $controller->listAll();
}
