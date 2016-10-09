<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Auth;
use App\Http\Requests\BudgetRequest;
use App\Budget;

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
    
    public function store(BudgetRequest $request, $resource_id)
    {
        $input = $request->all();
        
        // Obter id do usuário logado
        $input["user_id"] = Auth::user()->id;
        
        // Obter id do recurso a ser solicitado
        $input["resource_id"] = $resource_id;
        
        // Criar orçamento
        Budget::create($input);
        
        return redirect()->route("user.index");
    }
    
    
}
