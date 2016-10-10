<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User;

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
        
        return view('pages.dashboard', ['user' => $user, 'address' => $address]);
    }
    
}
