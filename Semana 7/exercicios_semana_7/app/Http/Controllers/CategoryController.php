<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|max:150|unique:categories',
            ]);

            $data = $request->all();
            $category = Category::create($data);
            return $category;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function index() {
        $categories = Category::all();
        return $categories;
    }

    public function show($id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return $category;
    }

    public function update($id,  Request $request) {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json(['message' => 'Categoria não encontrada'], 404);
            }

            if ($request->name) {
                $request->validate([
                    'name' => 'required|string|max:150|unique:categories',
                ]);
            }

            $category->update($request->all());

            return $category;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $category->delete();

        return response()->json(['message' => ''], 204);
    }
}
