<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller {

    public function store(Request $request) {
        try {
            $data = $request->all();

            $request->validate([
                'name' => 'string|required',
                'email' => 'email|required|unique:clients',
                'cpf' => 'string|required|unique:clients',
                'date_birth' => 'date_format:Y-m-d|required',
                'address' => 'string|required'
            ]);

            $client = Client::create($data);

            return $client;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function index(Request $request) {

        $params = $request->query();

        $clients = Client::query();

        if ($request->has('name') && !empty($params['name'])) {
            $clients->where('name', 'ilike', "%" . $params['name'] . "%");
        }

        if ($request->has('cpf') && !empty($params['cpf'])) {
            $clients->where('cpf', $params['cpf']);
        }

        if ($request->has('date_birth') && !empty($params['date_birth'])) {
            $clients->where('date_birth', $params['date_birth']);
        }

        return $clients->get();
    }
}
