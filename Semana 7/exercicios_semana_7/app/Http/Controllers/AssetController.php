<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller {
    public function index() {
        $products = Asset::all();
        return $products;
    }

    public function store(Request $request) {
        try {
            $data = $request->all();

            $product = Asset::create($data);

            return $product;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id) {
        $product = Asset::find($id);

        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        return $product;
    }

    public function update($id, Request $request) {
        try {


            $product = Asset::find($id);

            if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

            $product->update($request->all());

            return $product;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id) {
        $product = Asset::find($id);

        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        $product->delete();

        return response('', 204);
    }
}
