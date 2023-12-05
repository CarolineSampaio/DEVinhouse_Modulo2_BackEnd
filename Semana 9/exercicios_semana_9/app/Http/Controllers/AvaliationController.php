<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;
use Exception;
use Illuminate\Http\Request;


class AvaliationController extends Controller
{
    public function index(){
        $avaliations = Avaliation::all();
        return $avaliations;
     }

     public function store(Request $request){
         try {


             $data = $request->all();

             $avaliation = Avaliation::create($data);

             return $avaliation;

         } catch (Exception $exception) {
             return response()->json(['message' => $exception->getMessage()], 400);
         }

     }

     public function show($id){
         $avaliation = Avaliation::find($id);

         if(!$avaliation) return response()->json(['message' => 'Produto não encontrado'], 404);

         return $avaliation;
     }

     public function update($id, Request $request){
         try {


             $avaliation = Avaliation::find($id);

             if(!$avaliation) return response()->json(['message' => 'Produto não encontrado'], 404);

             $avaliation->update($request->all());

             return $avaliation;

         } catch (Exception $exception) {
             return response()->json(['message' => $exception->getMessage()], 400);
         }
     }

     public function destroy($id){
         $avaliation = Avaliation::find($id);

         if(!$avaliation) return response()->json(['message' => 'Produto não encontrado'], 404);

         $avaliation->delete();

         return response('', 204);
     }
}
