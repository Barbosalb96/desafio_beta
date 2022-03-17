<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        /**
         * metodo para pegar todos os filmes
         */
        $movie = Movie::all();
        return response()->json($movie);
    }

    /**
     * metodo para filtrar filme por name
     */
    public function filterMovie($name)
    {
        $movie = Movie::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($movie);
    }

    /**
     * metodo para pegar o filme e sua categoria
     */
    public function filterMovieCategory($name)
    {
        $movieCategory = Movie::with('category')
            ->where('name', 'like', '%' . $name . '%')
            ->get();

        return response()->json($movieCategory);
    }

    /**
     * metodo para pegar filmes e seus herois
     */
    public function HeroMovie()
    {
        $movie = Movie::with('heroes')->get();
        return response()->json($movie);
    }

    /**
     * metodo para filtrar o filmes e pegar os herois do filme
     */
    public function filterHeroMovie($name)
    {
        $movieHero = Movie::with('heroes')
            ->where('name', 'like', '%' . $name . '%')
            ->get();

        return response()->json($movieHero);
    }
}
