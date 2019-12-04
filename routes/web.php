<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::group(['middleware' => 'web'], function () {
    Route::get('/home', 'HomeController@index')
            ->name('home');

    Route::post('/disponibilidades/salvar', 
         'DisponibilidadeController@salvar')
            ->name('disponibilidades.salvar');

    Route::get('/oportunidades/candidatarse', 
        'OportunidadeMedicosInteressadosController@candidatarse')
            ->name('oportunidades.candidatarse');
    
    Route::get('/oportunidades/descandidatarse', 
        'OportunidadeMedicosInteressadosController@descandidatarse')
            ->name('oportunidades.descandidatarse');
});
//  Route::middleware('auth:api')->get('/home', function (Request $request) {
//      return Route::get('/home', 'HomeController@index')->name('home');
//  });