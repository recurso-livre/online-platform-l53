<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Http\Requests\BudgetRequest;
use App\Budget;
use App\Resource;
use Log;
use Illuminate\Support\Facades\Storage;
use Validator;

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

        $this->uploadBudgetValidation($request);
        
        $file_uploaded = $this->uploadBudget($request->file, Auth::user());
        
        $input["file"] = $file_uploaded['path'];
        
        // Criar orçamento
        $input['status'] = 'em-aberto';
        $input['rating'] = 0.00;
        $budget = Budget::create($input);
        
        //$filename = $file_uploaded['path_file']."/$budget->id.".$file_uploaded['extension'];
        
        
        // Padrão de nome: /budgets/<ID>.<EXTENSION>
        
        
        
        //Storage::move($file_uploaded['path'], $filename);
        
        return redirect()->route("user.index");
    }
    
    public function uploadBudgetValidation($request)
    {
        $validator = Validator::make(['file' => $request->file], [
            'file'  => 'required|max:102400'   // max:<kilobytes>
        ])->validate();

        return $validator;
    }
    
    public function uploadBudget($file, $user)
    {
        // Obter nome original do arquivo
        $filename = $file->getClientOriginalName();
        $path_file = "$user->id/budgets";
        
        // Manipulação do nome de arquivo (caso de nome longo)
        $filename = explode(".", $filename);

        if (strlen($filename[0]) > 170) {
            $filename[0] = substr($filename[0], 0, 170) . '-';
        }
        
        if (count($filename) > 1) {
            $filename[1] = substr($filename[1], 0, 10);
        }

        $filename = implode(".", $filename);

        $path = $file->storeAs($path_file, $filename);

        // Deixar o arquivo upado com visibilidade pública
        Storage::setVisibility($path, 'public');
        
        return ['path' => Storage::url($path), 'path_file' => $path_file, 'extension' => $file->extension()];
    }
    
    public function closeBudget(Request $request, $budgetId, $status)
    {
        Budget::find($budgetId)->update(['status' => $status]);
        
        return redirect()->route('auth.budget.ratingView', $budgetId);
    }
    
    public function viewRating(Request $request, $budgetId)
    {
        return view('pages.rating', ['budgetId' => $budgetId]);
    }
    
    public function rating(Request $request)
    {
        $input = $request->all();
        
        Budget::find($input['budgetId'])->update(['rating' => $input['rating'], 'comment' => $input['comment']]);
        
        return redirect()->route('auth.dashboard.index');
    }
}
