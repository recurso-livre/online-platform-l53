<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view("categoria.create");
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();

        // Criar categoria no BD
        Category::create($input);

        // Retorne para a própria página de criação de categoria
        return redirect()->route("auth.category.create");
    }
}
