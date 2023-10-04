<?php

function getBody()
{
    return json_decode(file_get_contents("php://input")); //pega o body no formato de string
}

function readFileContent($fileName)
{
    return json_decode(file_get_contents($fileName));
}

function saveFileContent($fileName, $content)
{
    file_put_contents($fileName, json_encode($content));
}
