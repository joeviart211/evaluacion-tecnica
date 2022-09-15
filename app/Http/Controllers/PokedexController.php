<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokedexController extends Controller
{
    public function show(Request $request){
        $id =rand("1", "905");
        $api= curl_init("https://pokeapi.co/api/v2/pokemon/$id/");
        $api2=curl_init("https://pokeapi.co/api/v2/pokemon-species/$id/");
        curl_setopt($api,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api2,CURLOPT_RETURNTRANSFER,true);
        $response=curl_exec($api);
        $response2=curl_exec($api2);
        curl_close($api);
        curl_close($api2);
        $json = json_decode($response);
        $json2= json_decode($response2);

        foreach($json2->flavor_text_entries as $key => $value ){

        if ($json2->flavor_text_entries[$key]->language->name=="es"){
           $description=$json2->flavor_text_entries[$key]->flavor_text;
           break;

        }


        }
        DB::insert('insert into pokemon (name) values (?)', [$json->name ]);

           return view ('dexter',compact('json','description'));
       }
       public function display (Request $request){
        $pokemons= DB::table('pokemon')->get();
        $apis=[];
        foreach($pokemons as $pokemon=>$value){

            $api= curl_init("https://pokeapi.co/api/v2/pokemon/$value->name/");
            curl_setopt($api,CURLOPT_RETURNTRANSFER, true);
            $response=curl_exec($api);
            curl_close($api);
            $response=curl_exec($api);
            curl_close($api);
            $json = json_decode($response);
            $apis[$pokemon]=$json;
        }
       



        return view ('guardados',compact('pokemons','apis'));
       }
}
