<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User;
use App\Resource;
use App\Budget;

class DashboardController extends Controller
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obter dados de usuário logado
        $user = Auth::user();
        $address = $user->addresses()->first();
        $orcamentos = $this->viewAllBudgets();
        
        if ($orcamentos == null)
        {
            $orcamentos['request'] = [];
            $orcamentos['ordered'] = [];
        }

        return view('pages.dashboard', ['user' => $user, 'address' => $address, 'orcamentos' => $orcamentos]);
    }
    
    // Método para obter todos os orçamentos (pedidos pelo usuário logado e recebidos pelo usuário logado).
    public function viewAllBudgets()
    {
        $lista_resources_id = Resource::where('user_id', '=', Auth::user()->id)->pluck('id');
        
        // Obter lista de orçamentos solicitados ao usuário logado
        for ($i = 0, $k = 0; $i < count($lista_resources_id); $i++)
        {
            $lista_budget_tmp[$i] = $this->getBudget('resource_id', $lista_resources_id[$i]);
            // Budget::orderBy('status', 'asc')->where('resource_id', '=', $lista_resources_id[$i])->get();

            for ($j = 0; $j < count($lista_budget_tmp[$i]); $j++, $k++)
                $lista_budget[$k] = $lista_budget_tmp[$i][$j];
        }
        
        $orcamentos['request'] = isset($lista_budget) ? $lista_budget : [];
        $orcamentos['ordered'] = $this->getBudget('user_id', Auth::user()->id); 
        // Budget::orderBy('status', 'asc')->where('user_id', '=', Auth::user()->id)->get();
        
        return $orcamentos;
    }
    
    private function getBudget($key, $value) {
        $finFornec = Budget::where(['status' => 'fin-fornec', $key => $value])->get();
        $emAberto = Budget::where(['status' => 'em-aberto', $key => $value])->get();
        $encerrado = Budget::where(['status' => 'encerrado', $key => $value])->get();
        
        foreach($emAberto as $item){
            $finFornec->push($item);
        }
        
        foreach($encerrado as $item){
            $finFornec->push($item);
        }
        
        return ($finFornec);
    }
    
    public function viewAllBudgetsOrdered()
    {
        return dd($this->viewAllBudgets());
    }
    
    
}
