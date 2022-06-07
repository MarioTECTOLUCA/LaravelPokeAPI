<?php

use App\Http\Controllers\PokemonsController;
use App\Models\Pokemons;
use Illuminate\Support\Facades\Route;


Route::get('/', [PokemonsController::class,'index'])->name('pokedex');

Route::get('/PokeAPI',[PokemonsController::class,'show']);
Route::get('/List',[PokemonsController::class,'list'])->name('pokedex.list');