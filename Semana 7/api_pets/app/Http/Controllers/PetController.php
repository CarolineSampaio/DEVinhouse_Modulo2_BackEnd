<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller {
    public function index() {
        return 'Olá Laravel Index';
    }

    public function store(Request $request) {
        $date = $request->all(); //pega todo o body

        $name = $request->input('name'); //pegar um campo específico

        return response()->json($date, 201);
    }
}
