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
use App\Budget;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['search', 'searchTesteView', 'searchTest', 'show']]);
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
    
    // Entrada: id resource
    // Saída: pages.resource.show ($resouce)
    public function show(Request $request, $resourceId)
    {
        $resource = Resource::find($resourceId);
        
        $html_infDesc = markdown($resource->informalDescription);
        $html_techDesc = markdown($resource->technicalDescription);
        
        $resource->informalDescription = $html_infDesc;
        $resource->technicalDescription = $html_techDesc;
        
        return view('pages.resource.show', 
            [
                'resource' => $resource, 
                'rating' => $this->getRating($resource)
            ]);
    }
    
    public function getRating(Resource $resource)
    {
        $budgets = Budget::where('resource_id', $resource->id)->where('status', 'encerrado')->get();
        
        $total_budgets = count($budgets);
        $total_rating = 0;
        
        foreach($budgets as $budget)
            $total_rating += $budget->rating;
        
        $media = $total_budgets === 0 ? 0 : $total_rating / $total_budgets;
        
        return (object)['media' => $media, 'total_budgets' => $total_budgets];
    }
    
    // Quantidade de budget finalizados
    
}

// route()