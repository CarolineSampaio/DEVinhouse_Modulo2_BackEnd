<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Specie;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecieController extends Controller {

    use HttpResponses;

    public function index() {
        $species = Specie::all();
        return $species;
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|unique:species|max:50'
            ]);

            $data = $request->all();
            $specie = Specie::create($data);
            return $specie;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id) {
        try {
            $specie = Specie::find($id);

            $count =  Pet::query()
                ->where('specie_id', $id)->count();

            if ($count > 0) {
                return $this->error('Não é possível remover a espécie, pois existem animais cadastrados com ela!', Response::HTTP_CONFLICT);
            }

            if (!$specie) {
                return $this->error('Espécie não encontrada!', Response::HTTP_NOT_FOUND);
            }

            $specie->delete();
            return response('Espécie removida com sucesso!');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
