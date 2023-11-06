<?php
require_once '../utils.php';
require_once '../models/Place.php';
require_once '../models/PlaceDAO.php';

class PlaceController {
    public function create() {
        $body = getBody();

        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $contact = sanitizeInput($body, 'contact', FILTER_SANITIZE_SPECIAL_CHARS);
        $openingHours = sanitizeInput($body, 'openingHours', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = sanitizeInput($body, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $latitude = sanitizeInput($body, 'latitude', FILTER_VALIDATE_FLOAT);
        $longitude = sanitizeInput($body, 'longitude', FILTER_VALIDATE_FLOAT);

        if (!$name) responseError('Nome do local ausente. Insira para prosseguir.', 400);
        if (!$contact) responseError('Contato do local ausente. Insira para prosseguir.', 400);
        if (!$openingHours) responseError('Horário de funcionamento do local ausente. Insira para prosseguir.', 400);
        if (!$description) responseError('Descrição do local ausente. Insira para prosseguir.', 400);
        if (!$latitude) responseError('Latitude do local ausente. Insira para prosseguir.', 400);
        if (!$longitude) responseError('Longitude do local ausente. Insira para prosseguir.', 400);

        $place = new Place($name);
        $place->setContact($contact);
        $place->setOpeningHours($openingHours);
        $place->setDescription($description);
        $place->setLatitude($latitude);
        $place->setLongitude($longitude);

        $placeDAO = new PlaceDAO();
        $result = $placeDAO->insert($place);

        if ($result['success'] === true) {
            response(["message" => "Cadastrado com sucesso"], 201);
        } else {
            responseError("Não foi possível realizar o cadastro", 400);
        }
    }

    public function list() {
        $placeDAO = new PlaceDAO();
        $result = $placeDAO->findMany();
        response($result, 200);
    }


    public function listOne() {
        $id = sanitizeInput($_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS, false);

        if (!$id) {
            responseError('ID ausente', 400);
        }

        $PlaceDAO = new PlaceDAO();
        $foundPlace = $PlaceDAO->findOne($id);
        response($foundPlace, 200);
    }

    public function delete() {
        $id = sanitizeInput($_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS, false);

        if (!$id) {
            responseError('ID ausente', 400);
        }

        $PlaceDAO = new PlaceDAO();
        $PlaceDAO->delete($id);
        response(['message' => 'Deletado com sucesso'], 204);
    }

    public function update() {
        $body = getBody();
        $id = sanitizeInput($_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS, false);

        if (!$id) {
            responseError('ID ausente', 400);
        }

        $PlaceDAO = new PlaceDAO();
        $PlaceDAO->update($id, $body);
        response(['message' => 'Informações do lugar atualizadas com sucesso.'], 200);
    }
}
