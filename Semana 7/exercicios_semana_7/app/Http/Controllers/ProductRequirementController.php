<?php

namespace App\Http\Controllers;

use App\Models\ProductRequirement;
use Illuminate\Http\Request;

class ProductRequirementController extends Controller {
    public function index(Request $request) {

        $product_id = $request->query('product_id');

        $productsRequirements = ProductRequirement::query()
            ->where('product_id', $product_id)
            ->get();

        return $productsRequirements;
    }

    public function store(Request $request) {

        try {
            $data = $request->all();

            $request->validate([
                'product_id' => 'integer|required'
            ]);

            $productRequirementTypeExists = ProductRequirement::query()
                ->where('product_id', $data['product_id'])
                ->where('type', $data['type'])
                ->first();

            if ($productRequirementTypeExists) {
                return response()->json(['message' => 'O requisito já foi cadastrado'], 409);
            }

            $productRequirement  = ProductRequirement::create($data);

            return $productRequirement;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function update($id, Request $request) {
        try {
            $ProductRequirement = ProductRequirement::find($id);

            if (!$ProductRequirement) return response()->json(['message' => 'Requerimento não encontrado'], 404);

            $ProductRequirement->update($request->all());

            return $ProductRequirement;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id) {
        $ProductRequirement = ProductRequirement::find($id);

        if (!$ProductRequirement) return response()->json(['message' => 'Requerimento não encontrado'], 404);

        $ProductRequirement->delete();

        return response('', 204);
    }
}
