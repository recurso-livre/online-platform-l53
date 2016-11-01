<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorageRequest;

class StorageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Método para exemplificar página de upload de arquivo
    public function uploadPage()
    {
        return view('storage.upload');
    }
    
    public function upload(StorageRequest $request)
    {
        // Obter nome original do arquivo
        $filename = $request->file->getClientOriginalName();
        $request->file->storeAs('dir', $filename);  // dir => nome da pasta onde ficará o arquivo

        return redirect()->route('user.index');
    }
}
