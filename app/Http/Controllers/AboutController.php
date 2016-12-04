<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(){
        
    }
    
    public function index(){
        return view('pages.about');
    }
}
