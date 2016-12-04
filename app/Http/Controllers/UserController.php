<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Resource;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index(){
        
        $categories = Category::orderBy('created_at', 'asc')->take(3)->get();
        
        $resources['Recentes'] = Resource::orderBy('created_at', 'desc')->take(10)->get();
        $this->decodeJson($resources['Recentes']);
        
        foreach($categories as $category){
            $resources[$category->name] = $category->resources()->orderBy('created_at', 'desc')->take(10)->get();
            $this->decodeJson($resources[$category->name]);
        }

        return view('pages.home', compact('resources'));
    }
    
    private function decodeJson($resources){
        foreach($resources as $resource){
            $resource->uriResources = json_decode($resource->uriResources);
        }
    }
}
