<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activo;
use App\Personal;

use Datatables;
use Carbon\Carbon;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Activo::with('hardware','software')->get();
        //dd($activos);
        return view('activo.index',compact('activos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function asignar(){
        $personals = Personal::all();
        //dd($personals);
        return view('activo.asignar',compact('personals'));
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRowDetails()
    {
        return view('activo.eloquent.row-details');
    }

    public function getRowDetailsData()
    {
        $activos = Activo::with('hardware','software')->get();


        /*
         * return Datatables::of(Cliente::where('estado_cliente','=',1))
            ->addColumn('check',function($cliente){
                return '<label class="pos-rel"><input type="checkbox" class="ace"><span class="lbl" id="'.$cliente->idcliente.'"></span></label>';
            })
            ->addColumn('edit',function($cliente){
                return '<a href="javascript:void(0)" ng-click="modalCliente(2,'.$cliente->idcliente.')" class="blue"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
                        <a href="javascript:void(0)" ng-click="delete(2,'.$cliente->idcliente.')" class="red"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->make(true);*/
        dump($activos);
        return Datatables::of($activos)
            ->addColumn('check',function($activo){
                return '<label class="pos-rel"><input type="checkbox" name=""><span class="lbl" id="'.$activo->idactivo.'"></span></label>';
            })
            ->make(true);
    }
}
