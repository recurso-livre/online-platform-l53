<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Http\Requests\BudgetRequest;
use App\Budget;
use App\Resource;
use Log;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Método para criar orçamento
    public function create()
    {
        
    }
    
    public function store(BudgetRequest $request)
    {
        $input = $request->all();
        
        // Obter id do usuário logado
        $input["user_id"] = Auth::user()->id;

        // Criar orçamento
        Budget::create($input);
        
        return redirect()->route("user.index");
    }
    
    public function getBudgetReceived()
    {
        //$lista_resources = Resource::where('user_id', '=', Auth::user()->id);
        
        return '';
    }
    
    
}
