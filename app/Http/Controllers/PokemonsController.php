<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use App\Models\Sprites;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class PokemonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function list()
    {
        $pokemons = DB::table('pokemons')->leftJoin('sprites','pokemons.id','sprites.fk_id_pokemon')->get();
        return view('table',['pokemons'=>$pokemons]);
    }

    public function show()
    {
        $randId = rand(1,898);
        $url = "https://pokeapi.co/api/v2/pokemon/{$randId}";
        $client = new Client(); 
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $json_decode = json_decode($response->getBody());
        try {
            DB::beginTransaction();
            $pokemon = new Pokemons();
            $pokemon->apiid = $json_decode->id;
            $pokemon->name = $json_decode->name;
            $pokemon->base_experience = $json_decode->base_experience;
            $pokemon->weight = $json_decode->weight;
            $pokemon->height = $json_decode->height;
            if($pokemon->save()){
                $sprite = new Sprites();
                $sprite->back_default = $json_decode->sprites->back_default;
                $sprite->back_shiny = $json_decode->sprites->back_shiny;
                $sprite->fk_id_pokemon = $pokemon->id;
                if($sprite->save()){
                    DB::commit();
                    return $json_decode;
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
        return null;
    }

}
