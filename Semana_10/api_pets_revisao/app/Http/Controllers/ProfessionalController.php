<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfessionalController extends Controller {

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'string|required|max:255',
                'contact' => 'string|required|max:30',
                'email' => 'string|required|unique:peoples',
                'cpf' => 'string|required|max:30|unique:peoples',
                'register' => 'string|required',
                'speciality' => 'string|required'
            ]);

            $dataPeople = $request->only('name', 'cpf', 'contact', 'email');
            $dataProfessional = $request->only('register', 'speciality');

            $people = People::create($dataPeople);

            Professional::create([
                'people_id' => $people->id,
                // 'register' => $dataProfessional['register'],
                // 'speciality' => $dataProfessional['speciality']
                ...$dataProfessional
            ]);

            return $people;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function index(Request $request) {

        $search = $request->input('name'); // filtro query params

        $professionals = Professional::query()
            ->with('people')
            /*
            ->whereHas('people', function ($query) use ($search) {
                $query
                    // ->select('id','name','cpf', 'email', 'contact')
                    ->where('name', 'ilike', "%$search%")
                    ->orWhere('cpf', 'ilike', "%$search%")
                    ->orWhere('contact', 'ilike', "%$search%")
                    ->orWhere('email', 'ilike', "%$search%");
            })
            */
            ->get();

        return $professionals;
    }
}
