<?php
require_once 'config.php';
require_once 'utils.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $guiche1 = readFileContent(ARQUIVO_GUICHE_1);
    $guiche2 = readFileContent(ARQUIVO_GUICHE_2);
    $guiche3 = readFileContent(ARQUIVO_GUICHE_3);

    $info = ['tv1' => null, 'tv2' => null, 'tv3' => null];

    if (count($guiche1) > 0) {
        $info['tv1'] =  $guiche1[0];
    }

    if (count($guiche2) > 0) {
        $info['tv2'] =  $guiche2[0];
    }

    if (count($guiche3) > 0) {
        $info['tv3'] =  $guiche3[0];
    }

    echo json_encode($info);
}
