<?php

namespace App\Http\Controllers;

use App\Models\ProductMarker;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductMarkerController extends Controller {
    public function index() {
        try {
            $productMarkers = ProductMarker::query()->select(
                'products_markers.id as id_product_marker',
                'products.name as product_name',
                'markers.name as marker_name',
                'products.id as product_id',
                'markers.id as marker_id'
            )
                ->join('products', 'products.id', '=', 'products_markers.product_id')
                ->join('markers', 'markers.id', '=', 'products_markers.marker_id')
                ->get();

            return $productMarkers;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'product_id' => 'required|integer',
                'marker_id' => 'required|integer'
            ]);

            $data = $request->all();

            $productMarker = ProductMarker::create($data);

            return $productMarker;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id) {
        $productMarker = ProductMarker::find($id);

        if (!$productMarker) {
            return response()->json(['message' => 'Marcador de produto não encontrado'], 404);
        }

        $productMarker->delete();
        return response('', 204);
    }
}
