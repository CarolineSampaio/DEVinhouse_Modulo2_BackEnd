<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return $categories;
     }

     public function store(Request $request){
         try {
             $request->validate([
                 'name' => 'required|unique:categories|string|max:50'
             ]);

             $data = $request->all();

             $category = Category::create($data);

             return $category;

         } catch (Exception $exception) {
             return response()->json(['message' => $exception->getMessage()], 400);
         }

     }

     public function show($id){
         $category = Category::find($id);

         if(!$category) return response()->json(['message' => 'Categoria não encontrada'], 404);

         return $category;
     }

     public function update($id, Request $request){
         try {

             $category = Category::find($id);

             if(!$category) return response()->json(['message' => 'Produto não encontrado'], 404);

             $request->validate([
                 'name' => [
                     'required',
                     Rule::unique('products')->ignore($category->id),
                 ]
             ]);

             $category->update($request->all());

             return $category;

         } catch (Exception $exception) {
             return response()->json(['message' => $exception->getMessage()], 400);
         }
     }

     public function destroy($id){
         $category = Category::find($id);

         if(!$category) return response()->json(['message' => 'Categoria não encontrada'], 404);

         $category->delete();

         return response('', 204);
     }
}
