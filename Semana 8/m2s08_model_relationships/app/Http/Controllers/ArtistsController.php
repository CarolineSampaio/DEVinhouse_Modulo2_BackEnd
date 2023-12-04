<?php

namespace App\Http\Controllers;

use App\Models\Artist as ArtistModel;
use App\Models\ArtistGender as ArtistGenderModel;
use App\Models\Gender as GenderModel;
use App\Models\Instrument as InstrumentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtistsController extends Controller
{
    public function index()
    {
        try {
            $artists = ArtistModel::with(['instrument'])->get();
            return $this->response($artists, $this->message($artists, 'artista', 'encontrado'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = [
                'name' => 'required | min: 2',
                'birthdate' => 'required',
                'bio' => 'string',
                'is_singer'=> 'boolean',
                'favorite_instrument' => 'string',
                'genders' => 'array'
            ];

            $request->validate($validator);
            
            $artist = $this->setArtist((object) $request->all());

            if(!empty($request->input('genders')))
            {
                $this->setGenders($request->input('genders'), $artist);
            }


            if(!empty($request->input('favorite_instrument')))
            {
                $this->setInstrument($request->input('favorite_instrument'), $artist);
            }

            return $this->response($artist, $this->message($artist,'artista','cadastrado'));

        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $artist = ArtistModel::with(['instrument', 'genders'])->find($id);
            return empty($artist)
                ? $this->error('Artista não encontrado', Response::HTTP_NOT_FOUND)
                : $this->response($artist, $this->message($artist,'artista','encontrado'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $artist = ArtistModel::find($id);
            $artist->instrument->delete(); 

            $artist->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    private function setArtist($data)
    {
        $payloadArtist = [
            'name' => $data->name,
            'birthdate' => Carbon::parse($data->birthdate),
            'bio' => $data->bio,
            'is_singer'=> empty($data->is_singer) ? false : $data->is_singer,
        ];

        return ArtistModel::create($payloadArtist); 
    }

    private function setGenders($genders, ArtistModel $artist)
    {
        foreach($genders as $name)
        {
            $gender = GenderModel::firstOrCreate(['name' => $name]);

            ArtistGenderModel::firstOrCreate(
                [
                    'artist_id' => $artist->id,
                    'gender_id'=> $gender->id
                ]
            );
        }
    }

    private function setInstrument($name, ArtistModel $artist)
    {
        $instrument = InstrumentModel::firstOrCreate(['name'=> $name]);
        $artist->favorite_instrument_id = $instrument->id;
        $artist->save();
    }
}
