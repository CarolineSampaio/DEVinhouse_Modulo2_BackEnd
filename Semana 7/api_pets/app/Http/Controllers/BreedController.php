<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Exception;
use Illuminate\Http\Request;

class BreedController extends Controller {
    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|unique:breeds|max:50'
            ]);

            $data = $request->all();

            $breed = Breed::create($data);

            return $breed;
        } catch (\Exception $exception) {
            return $this->response($exception->getMessage(), [], false, 400);
        }
    }

    public function index() {
        $breeds = Breed::all();
        return $this->response('Raças listadas com sucesso', $breeds);
    }
}
