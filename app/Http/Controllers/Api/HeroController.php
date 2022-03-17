<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Heroes;


class HeroController extends Controller
{
    /**
     * metodo para pegar todos os herois
     */
    public function index()
    {
        $heros = Heroes::all();
        return response()->json($heros);
    }

    /**
     * metodo para filtrar heroe pelo name
     */
    public function filterHero($hero)
    {
        $heros = Heroes::where('name', 'like', '%' . $hero . '%')->get();
        return response()->json($heros);
    }

    /**
     * metodo para pegar todos os herois e seus poderes
     */
    public function heroPower()
    {
        $heros = Heroes::with('power')->get();
        return response()->json($heros);
    }

    /**
     * metodo para pegar somente um heroi e seu poder por name
     */
    public function filterHeroPowers($hero)
    {
        $heros = Heroes::with('power')
            ->where('name', 'like', '%' . $hero . '%')
            ->get();
        return response()->json($heros);
    }

    /**
     * metodo para pegar o filme que o heroi faz parte
     */
    public function HeroMovie()
    {
        $movie = Heroes::with('movies')->get();
        return response()->json($movie);
    }

    /**
     * metodo para filtar o filme por heroi
     */
    public function filterHeroMovie($name)
    {
        $movieHero = Heroes::with('movies')
            ->where('name', 'like', '%' . $name . '%')
            ->get();

        return response()->json($movieHero);
    }
}
