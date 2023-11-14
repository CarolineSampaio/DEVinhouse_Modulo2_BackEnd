<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoasController extends Controller {
    public function index() {
        try {
            $pessoas = Pessoa::all();
            $message = $pessoas->count() . " " . ($pessoas->count() === 1 ? "pessoa encontrada" : "pessoas encontradas") . " com sucesso.";
            return $this->response($message, $pessoas);
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), null, false, 500);
        }
    }


    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required | min: 3 | max: 150',
                'cpf' => 'min: 11 | max: 20',
                'contact' => 'max: 20',
            ]);

            $pessoa = Pessoa::create($request->all());
            $message = $pessoa->name . " cadastrada com sucesso";
            return $this->response($message, $pessoa);
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), null, false, 500);
        }
    }

    public function update($id, Request $request) {
        try {
            $request->validate([
                'name' => 'required | min: 3 | max: 150',
                'cpf' => 'min: 11 | max: 20',
                'contact' => 'max: 20',
            ]);

            $pessoa = Pessoa::find($id);

            if (empty($pessoa)) {
                return $this->response('Pessoa não encontrada.', null, false, 404);
            }

            $pessoa->update($request->all());
            $message = $pessoa->name . " atualizado com sucesso.";
            return $this->response($message, $pessoa);
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), null, false, 500);
        }
    }

    public function destroy($id) {
        try {
            $pessoa = Pessoa::find($id);

            if (empty($pessoa)) {
                return $this->response('Pessoa não encontrada', null, false, 404);
            }

            $success = Pessoa::destroy($id);
            return $this->response("Pessoa $pessoa->name excluida com sucesso", null);
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), null, false, 500);
        }
    }

    public function show($id) {
        try {
            $pessoa = Pessoa::find($id);

            if (empty($pessoa)) {
                return $this->response('Pessoa não encontrada', null, false, 404);
            }

            $message = "Pessoa " . $pessoa->name . " encontrada com sucesso.";
            return $this->response($message, $pessoa);
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), null, false, 500);
        }
    }
}
