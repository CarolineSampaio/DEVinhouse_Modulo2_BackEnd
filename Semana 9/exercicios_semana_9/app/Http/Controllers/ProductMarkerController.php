<?php

namespace App\Http\Controllers;

use App\Models\ProductMarker;
use Exception;
use Illuminate\Http\Request;

class ProductMarkerController extends Controller
{
    public function store(Request $request){
        try {
            $request->validate([
                'product_id' => 'required|integer',
                'marker_id' => 'required|integer'
            ]);

            $data = $request->all();

            $productMarker = ProductMarker::create($data);

            return $productMarker;

        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }

    }
}
