<?php

namespace App\Http\Controllers;

use App\Services\PokeApiService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected $pokeApiService;

    public function __construct(PokeApiService $pokeApiService)
    {
        $this->pokeApiService = $pokeApiService;
    }

    public function search(Request $request)
    {
        $pokemonName = $request->input('name');
        $pokemonData = null;

        if ($pokemonName) {
            $pokemonData = $this->pokeApiService->getPokemon($pokemonName);
        }

        return view('dashboard', compact('pokemonData'));
    }

    public function random()
    {
        $pokemonData = $this->pokeApiService->getRandomPokemon();
        return view('dashboard', compact('pokemonData'));
    }
}