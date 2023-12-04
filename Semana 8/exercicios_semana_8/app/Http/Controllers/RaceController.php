<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RaceController extends Controller {
    public function index() {
        try {
            $races = Race::all();
            return $this->response("Requisição realizada com sucesso.", $races);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id) {
        try {
            $race = Race::find($id);

            if (!$race) {
                return $this->response("Raça não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }

            return  $this->response("A raça $race->name foi encontrada com sucesso", $race);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|min:3|max:50|unique:races',
            ]);

            $data = $request->all();
            $race = Race::create($data);

            return $this->response("Raça cadastrada com sucesso", $race);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id, Request $request) {
        try {
            $race = Race::find($id);

            if (!$race) {
                return $this->response("Raça não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }

            $request->validate([
                'name' => 'required|string|min:3|max:50|unique:races',
            ]);

            $race->update($request->all());

            return $this->response("Raça atualizada com sucesso", $race);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id) {
        try {
            $race = Race::find($id);

            if (!$race) {
                return $this->response("Raça não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }

            $race->delete();

            return $this->response("Raça $race->name deletada com sucesso", null);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
