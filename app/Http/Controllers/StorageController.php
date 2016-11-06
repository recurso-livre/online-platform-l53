<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorageRequest;
use Illuminate\Support\Facades\Storage;
use App\User;

class StorageController extends Controller
{
    
    public function __construct(User $user)
    {
        $this->middleware('auth');
    }
    
    // Método para exemplificar página de upload de arquivo
    public function uploadPage()
    {
        return view('storage.upload', ['ls' => Storage::allFiles('')]);
    }
    
    public function upload(StorageRequest $request)
    {
        // Obter nome original do arquivo
        $filename = $request->file->getClientOriginalName();
        $path = $request->file->storeAs('dir', $filename);  // dir => nome da pasta onde ficará o arquivo

        // Deixar o arquivo upado com visibilidade pública
        Storage::setVisibility($path, 'public');

        return redirect()->route('auth.storage.upload');
    }
    
    public function deleteFile(Request $request)
    {
        $del_filename = $request->get('del_filename');
        
        Storage::delete($del_filename);
        
        return redirect()->route('auth.storage.upload');
    }
}
