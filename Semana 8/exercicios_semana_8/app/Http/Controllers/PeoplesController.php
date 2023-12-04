<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\People as PeopleModel;

class PeoplesController extends Controller
{
    public function index()
    {
        try {
            $peoples = PeopleModel::all();
            $message = $peoples->count()." ".($peoples->count() === 1 ? "pessoa encontrada" : "pessoas encontradas")." com sucesso.";
            return $this->response($message, $peoples);
        } catch(\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required | min: 3 | max: 150',
                'cpf' => 'min: 11 | max: 20',
                'contact' => 'max: 20',
            ]);

            $payload = $request->all();
            $people = PeopleModel::create($payload);

            return $this->response("Pessoa $people->name cadastrada com sucesso.", $people);
        } catch(\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $id)
    {
        try {
            $people = PeopleModel::find($id);

            if(empty($people))
            {
                return $this->response("Pessoa não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }

            return $this->response("Pessoa $people->name encontrada com sucesso.", $people);
        } catch(\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'min: 3 | max: 150',
                'cpf' => 'min: 11 | max: 20',
                'contact' => 'max: 20',
            ]);
            
            $people = PeopleModel::find($id);

            if(empty($people))
            {
                return $this->response("Pessoa não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }

            $payload = $request->all();
            $people->update($payload);

            return $this->response("Pessoa $people->name atualizada com sucesso", $people);
        } catch(\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(string $id)
    {
        try {
            $people = PeopleModel::find($id);

            if(empty($people))
            {
                return $this->response("Pessoa não encontrada", null, false, Response::HTTP_NOT_FOUND);
            }
            
            PeopleModel::destroy($id);
            return $this->response("Pessoa $people->name exluida com sucesso.", null);
        } catch(\Exception $e) {
            return $this->response($e->getMessage(), null, false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
