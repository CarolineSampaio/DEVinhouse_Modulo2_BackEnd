<?php
require_once 'utils.php';
require_once 'models/Review.php';



class ReviewController {

    public function create() {
        $body = getBody();
        $blacklist = ['polimorfismo',  'herança', 'abstração', 'encapsulamento'];

        $place_id = sanitizeInput($body, 'place_id', FILTER_SANITIZE_SPECIAL_CHARS);
        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = sanitizeInput($body, 'email', FILTER_VALIDATE_EMAIL);
        $stars = sanitizeInput($body, 'stars', FILTER_VALIDATE_FLOAT);

        if (!$place_id) responseError('ID do local ausente. Insira para prosseguir.', 400);
        if (!$name) responseError('Descrição da avaliação ausente. Insira para prosseguir.', 400);
        if (!$email) responseError('Email informado inválido. Insira corretamente para prosseguir.', 400);
        if (!$stars) responseError('Quantidade de estrelas ausente. Insira para prosseguir.', 400);

        if (strlen($name) > 200) responseError('O texto ultrapassou o limite de 200 caracteres.', 400);

        foreach ($blacklist as $word) {
            if (str_contains(strtolower($name), $word)) {
                $name = str_ireplace($word, '[EDITADO PELO ADMIN]', $name);
            }
        }

        $review = new Review($place_id);
        $review->setName($name);
        $review->setEmail($email);
        $review->setStars($stars);
        $review->save();

        response(['message' => 'Avaliação enviada com sucesso. Após a análise, ela ficará visível para todos.'], 201);
    }

    public function list() {
        $place_id = sanitizeInput($_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS, false);

        if (!$place_id) responseError('ID do local ausente. Insira para prosseguir.', 400);

        $reviews = new Review($place_id);

        response($reviews->list(), 200);
    }

    public function update() {
        $body = getBody();
        $id =  sanitizeInput($_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS, false);

        $status = sanitizeInput($body,  'status', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$id) responseError('ID da avaliação ausente. Insira para prosseguir.', 400);
        if (!$status) responseError('Status ausente. Insira para prosseguir.', 400);

        $review = new Review();
        $review->updateStatus($id, $status);
        response("Alteração de status para $status realizada com sucesso.", 200);
    }
}
