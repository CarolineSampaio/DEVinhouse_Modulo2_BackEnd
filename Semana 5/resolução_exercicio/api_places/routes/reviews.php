<?php
require_once '../config.php';
require_once '../controller/ReviewController.php';

$method = $_SERVER['REQUEST_METHOD'];

$controller = new ReviewController();

if ($method === 'POST') {
    $controller->create();
} else if ($method === 'GET') {
    $controller->list();
} else if ($method === "PUT") {
    $controller->update();
}
