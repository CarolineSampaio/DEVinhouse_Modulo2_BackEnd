<?php
require_once '../config.php';
require_once '../controllers/DashboardController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new DashboardController();

if ($method === 'GET') {
    $controller->dashboard();
}
