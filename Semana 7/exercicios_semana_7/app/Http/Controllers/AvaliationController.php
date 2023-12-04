<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AvaliationController extends Controller {
    public function index() {
        try {
            $avaliation = Avaliation::query()->select(
                'avaliations.id as id_avaliation',
                'avaliations.description',
                'avaliations.recommended',
                'products.name as product_name',
                'products.id as product_id'
            )
                ->join('products', 'products.id', '=', 'avaliations.product_id')
                ->get();

            return $avaliation;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(Request $request) {
        try {
            $data = $request->all();

            $avaliation = Avaliation::create($data);

            return $avaliation;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id) {
        $avaliation = Avaliation::query()
            ->select(
                'avaliations.id as id_avaliation',
                'products.id as product_id',
                'products.name as product_name',
                'avaliations.description',
                'avaliations.recommended'
            )
            ->join('products', 'products.id', '=', 'avaliations.product_id')
            ->where('avaliations.id', $id)
            ->first(); // Adicionando '->first()' para executar a consulta e obter os resultados

        if (!$avaliation) {
            return response()->json(['message' => 'Avaliação não encontrada'], 404);
        }
        return $avaliation;
    }

    public function update($id, Request $request) {
        try {
            $avaliation = Avaliation::find($id);

            if (!$avaliation) return response()->json(['message' => 'Produto não encontrado'], 404);

            $avaliation->update($request->all());

            return $avaliation;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id) {
        $avaliation = Avaliation::find($id);

        if (!$avaliation) return response()->json(['message' => 'Produto não encontrado'], 404);

        $avaliation->delete();

        return response('', 204);
    }
}
