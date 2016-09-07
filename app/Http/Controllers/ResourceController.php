<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use App\Http\Requests\ResourceRequest;
use App\Category;
use App\Resource;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método para inclusão de recurso (criação)
    public function create()
    {
        // Se não houver pelo menos 1 categoria, impeça a criação de recurso
        if (Category::count() == 0)
            return "É preciso criar 1 categoria.";

        $categories = Category::pluck('name', 'id');

        // Caso haja 1 categoria ou mais, continue o cadastro...
        return view("pages.resource.create", compact('categories'));
    }

    // Método para armazenamento dos dados de recurso passados na requisição
    public function store(ResourceRequest $request)
    {
        $input = $request->all();

        // Obter id do usuário logado
        $input["user_id"] = Auth::user()->id;

        // Criar registro de recurso
        $recurso = Resource::create($input);

        // Anexar categoria selecionado a recursos
        $recurso->categories()->attach($input["category_id"]);

        // Após cadastro, vá para a página inicial
        return redirect()->route("user.index");
    }

    public function searchTesteView()
    {
        return view("recurso.search");
    }

    public function searchTest(Request $request)
    {
        $input = $request->all();
        $search = $input["searchField"];

        // Realizar a pesquisa pelo nome do recurso
        $resources = Resource::search(null)->where('name', $search)->get();

        return view("recurso.search-result", compact("resources"));
    }
}
