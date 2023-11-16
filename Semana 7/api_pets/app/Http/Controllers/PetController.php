<?php


namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller {
    public function index() {
        try {
            $pets = Pet::all();
            return $pets;
        } catch (\Throwable $th) {
            return;
        }
    }

    public function store(Request $request) {
        $data = $request->all();
        // Pegar somente um campo $name = $request->input('name');
        $pet = Pet::create($data);
        return $pet;
    }

    public function destroy($id) {
        $pet = Pet::find($id);

        if (!$pet) return $this->response('Pet não encontrado', null, false, 404);

        $pet->delete();
        return $this->response('', null, true, 204);
    }

    public function show($id) {
        $pet = Pet::find($id);

        if (!$pet) return $this->response('Pet não encontrado', null, false, 404);

        return $this->response('', $pet, true, 200);
    }

    public function update($id, Request $request) {
        $data = $request->all();

        $pet = Pet::find($id);

        if (!$pet) return $this->response('Pet não encontrado', null, false, 404);

        $pet->update($data);

        return $pet;
    }
}
