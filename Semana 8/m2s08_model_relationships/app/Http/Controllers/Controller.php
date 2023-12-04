<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function response($data, string $message, bool $status = true, $statusCode = Response::HTTP_OK)
    {
        $data = [
            "status"=> $status,
            "message"=> $message,
            "data"=> $data,
        ];

        return response()->json($data, $statusCode);
    }

    public function error(string $message, $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return $this->response(null, $message, false, $statusCode);
    }

    public function message($data, string $model, string $action, string $prop = 'name'): string
    {
        if($data instanceof Collection)
        {
            return ($data->count() === 1)
                ? $data->count()." ".$model." ".$action." com sucesso"
                : $data->count()." ".$model."s ".$action."s com sucesso";
        }

        return ucfirst($model)." ".$data[$prop]." ".$action." com sucesso";
    }
}
