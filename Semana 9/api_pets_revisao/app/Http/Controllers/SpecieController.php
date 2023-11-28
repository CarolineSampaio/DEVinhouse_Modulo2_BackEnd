<?php

namespace App\Http\Controllers;

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
}
