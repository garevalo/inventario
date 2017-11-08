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
    return redirect()->route('login');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::resource('subgerencia','SubgerenciaController');
    Route::resource('gerencia','GerenciaController');
    Route::resource('sede','SedeController');
    Route::resource('cargo','CargoController');
    Route::resource('personal','PersonalController');
    Route::get('hardware/getalldata','HardwareController@getalldata')->name('getalldatahardware');
    Route::resource('hardware','HardwareController');
    Route::resource('software','SoftwareController');
    Route::get('tiposoftware/alldata','TipoSoftwareController@alldata')->name('getdatatiposoftware');
    Route::resource('tiposoftware','TipoSoftwareController');
    Route::get('tipohardware/alldata','TipohardwareController@alldata')->name('getdatatipohardware');
    Route::resource('tipohardware','TipohardwareController');


    Route::get('activo/asignar','ActivoController@asignar')->name('asignar');
    Route::get('activo/getdata','ActivoController@getRowDetailsDataActivo')->name('getdataactivo');
    Route::get('activo/allgetdata','ActivoController@getRowDetailsDataAll')->name('allgetdataactivo');
    Route::resource('activo','ActivoController');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('reporte/activosobsoletos', 'ReporteController@ActivosObsoletos');
    Route::get('reporte/licenciaspagadas', 'ReporteController@LicenciasPagadas');
    Route::post('reporte/veractivosobsoletos','ReporteController@ActivosObsoletosPdf');
    Route::post('reporte/verlicenciaspagadas','ReporteController@LicenciasPagadasPdf');

    Route::get('reporte/activos/operativos', 'ReporteController@ActivosOperativos');
    Route::get('reporte/activos/getoperativos', 'ReporteController@getActivosOperativos');

    Route::get('reporte/activos/vencidos', 'ReporteController@ActivosVencidos');

});


