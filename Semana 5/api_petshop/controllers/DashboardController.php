<?php
require_once '../utils.php';
require_once '../models/Pet.php';

class DashboardController {
    public function dashboard() {
        $pet = new Pet();
        $result = $pet->dashboard();
        response($result, 200);
    }
}
