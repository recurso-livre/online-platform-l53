<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use App\Http\Requests\ResourceRequest;
use App\Http\Requests\ResourceSearchRequest;
use App\Category;
use App\Resource;
use App\User;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['search', 'searchTesteView', 'searchTest']]);
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

    public function search(ResourceSearchRequest $request, $category, $query, $page)
    {
        // Pesquisar por nome de recurso
        $resources = Resource::search($query)->get();
        
        if (count($resources) == 0)
        {
            // Pesquisar a partir do nome do usuário
            $user = User::search($query)->get()->first();
            
            // Caso o usuário não seja encontrado, retorne coleção vazia para o chunk funcionar
            if ($user == null)
            {
                $resources = collect([]);
            } else
            {
                $resources = $user->resources()->get();
            }
        }

        $pages = $resources->chunk(12);
        $count = count($pages);

        if ($page < 1 || $page > $count) {
            $page = 1;
        }

        if ($count !== 0) {
            $resources = $pages[$page-1];
        }

        foreach ($resources as $resource) {
            $resource->uriResources = json_decode($resource->uriResources);
        }

        $search = [
            'category' => $category,
            'query' => $query,
            'page' => intval($page),
            'pages' => $count,
            'resources' => $resources
        ];

        return view("pages.resource.search", compact('search'));
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
