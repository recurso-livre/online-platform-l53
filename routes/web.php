<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/home', 'HomeController@index');


//Auth::routes();
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::get('logout', 'Auth\LoginController@logout');
    
    // Registration Routes...
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    //Route::post('register', 'Auth\RegisterController@register');
    
    // Password Reset Routes...
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    

// Rota para página 
//Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
    

Route::group(['as' => 'user.'], function ()
{
    Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
});

Route::group(['as' => 'guest.'], function ()
{
    Route::post('acessar', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);


    Route::get('cadastrar', ['as' => 'create', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('cadastrar', ['as' => 'create.post', 'uses' => 'Auth\RegisterController@register']);

    // Rota para teste de pesquisa de recurso
    Route::get("recurso/pesquisaTeste", ["as" => "resource.searchtest.view", "uses" => "ResourceController@searchTesteView"]);
    Route::get("recurso/pesquisaResultado/{itens?}", ["as" => "resource.searchtest.view.result", "uses" => "ResourceController@searchTest"]);

    Route::get('recurso/procurar/{category}/{query}/{page}', ['as' => 'resource.search', 'uses' => 'ResourceController@search']);
    
    Route::group(['prefix' => 'password',  'as' => 'password.'], function()
    {
        Route::get('reset', ['as' => 'reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
        Route::post('reset', ['as' => 'reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
        
        Route::get('reset/{token}', ['as' => 'reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
        
        Route::post('email', ['as' => 'email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    });
    
});

Route::group(['as' => 'auth.'], function ()
{
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    
    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function ()
    {
        Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);
    });
    
    Route::group(['as' => 'resource.', 'prefix' => 'recurso'], function ()
    {
        Route::get('cadastrar', ['as' => 'create', 'uses' => 'ResourceController@create']);
        Route::post('cadastrar', ['as' => 'store', 'uses' => 'ResourceController@store']);
    });
    
    Route::group(['as' => 'category.', 'prefix' => 'categoria'], function ()
    {
        Route::get('cadastrar', ['as' => 'create', 'uses' => 'CategoryController@create']);
        Route::post('cadastrar', ['as' => 'store', 'uses' => 'CategoryController@store']);
    });
    
    Route::group(['as' => 'budget.', 'prefix' => 'orcamento'], function ()
    {
        Route::post('cadastrar', ['as' => 'store', 'uses' => 'BudgetController@store']);
    });
});
