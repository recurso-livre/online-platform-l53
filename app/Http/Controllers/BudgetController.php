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
        $budget = Budget::create($input);
        
        $filename = $file_uploaded['path_file']."/$budget->id.".$file_uploaded['extension'];
        
        $budget->file = Storage::url($filename);
        $budget->save();
        
        // Padrão de nome: /budgets/<ID>.<EXTENSION>
        Storage::move($file_uploaded['path'], $filename);
        
        return redirect()->route("user.index");
    }
    
    public function uploadBudgetValidation($request)
    {
        $validator = Validator::make(['file' => $request->file], [
            'file'  => 'required|mimes:txt|max:10240'   // max:<kilobytes>
        ])->validate();

        return $validator;
    }
    
    public function uploadBudget($file, $user)
    {
        // Obter nome original do arquivo
        $filename = $file->getClientOriginalName();
        $path_file = "$user->id/budgets";
        $path_tmp = $path_file;
        $path = $file->storeAs($path_tmp, $filename);
        
        $path_tmp .= '/'.$filename;

        // Deixar o arquivo upado com visibilidade pública
        Storage::setVisibility($path, 'public');
        
        return ['path' => $path_tmp, 'path_file' => $path_file, 'extension' => $file->extension()];
    }
}
