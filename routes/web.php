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
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resource('subgerencia','SubgerenciaController');
    Route::resource('gerencia','GerenciaController');
    Route::resource('sede','SedeController');
    Route::resource('cargo','CargoController');
    Route::resource('personal','PersonalController');
    Route::resource('hardware','HardwareController');
    Route::resource('software','SoftwareController');
    Route::resource('activo','ActivoController');
    Route::get('/home', 'HomeController@index')->name('home');
});


