<?php

namespace App\Http\Controllers;

use App\Models\Band as BandModel;
use App\Models\Gender as GenderModel;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try 
        {
            $bands = BandModel::with('gender')->get();
            return $this->response($bands, $this->message($bands, 'banda', 'encontrada'));
        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try 
        {
            $validator = [
                "name" => "required | string | min: 2",
                "gender_id" => "required | int",
                "description" => "string"
            ];
            $request->validate($validator);

            if(empty(GenderModel::find($request->input("gender_id"))))
            {
                return $this->error("Genêro não existe", Response::HTTP_NOT_FOUND);
            }

            $bandsCollection = BandModel::where(["name" => $request->input("")])->get();

            if($bandsCollection->isNotEmpty())
            {
                $band = $bandsCollection->first();
                return $this->error("Banda $band->name ja se encontra cadastrada", Response::HTTP_CONFLICT);
            }

            $band = BandModel::create($request->all());
            return $this->response($band, $this->message($band, "banda", "cadastrada"));
        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try 
        {
            $band = BandModel::with('gender')->find($id);
            return empty($band) 
                ? $this->error('Banda não encontrada', Response::HTTP_NOT_FOUND)
                : $this->response($band, $this->message($band, 'banda', 'encontrada'));
        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try 
        {
            $validator = [
                "name" => "string | min: 2",
                "gender_id" => "int",
                "description" => "string"
            ];

            $request->validate($validator);

            if(empty(GenderModel::find($request->input("gender_id"))))
            {
                return $this->error("Genêro não existe", Response::HTTP_NOT_FOUND);
            }

            $band = BandModel::find($id);

            if(empty($band))
            {
                return $this->error('Banda não encontrada', Response::HTTP_NOT_FOUND);
            }

            /** Forma Mais Trabalhosa */
            // $band->name = $request->input("name");
            // $band->gender_id = $request->input("gender_id");
            // $band->description = $request->input("description");
            // $band->save();

            $band->update($request->all());
            return $this->response($band, $this->message($band, 'banda', 'atualizada'));
        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try 
        {

        } catch (\Exception $e) 
        {
            return $this->error($e->getMessage());
        }
    }
}
