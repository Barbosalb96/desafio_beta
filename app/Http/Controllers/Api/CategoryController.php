<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Heroes;

class CategoryController extends Controller
{
    /**
     * metodo para pegar todos as categorias
     */
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    /**
     * metodo para filtrar categoria por nome
     */
    public function filterCategory($category)
    {
        $category = Category::where('name', 'like', '%' . $category . '%')->get();
        return response()->json($category);
    }

    /**
     * metodo pega os filmes por categoria
     */
    public function filterCategoryMovie($category)
    {
        $category = Category::with('movie')
            ->where('name', 'like', '%' . $category . '%')
            ->get();
        return response()->json($category);
    }
}
