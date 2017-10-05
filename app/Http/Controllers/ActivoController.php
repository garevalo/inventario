<?php

namespace App\Http\Controllers;

use App\TipoHardware;
use Illuminate\Http\Request;
use App\Activo;
use App\Personal;
use App\Personals_activos;

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
        foreach ($request->activo as $activo){
            Personals_activos::create(['activos_id'=>$activo->activo,
                                       'personals_idpersonal'=>$request->personal,
                                        'fecha_asignacion'=> date('Y-m-d') ]);

            Activo::FindOrFail($activo->activo)->update('asignado',1);
        }

        return redirect()->route('activo.index');

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

        return Datatables::of($activos)

            ->addColumn('campo1',function($activo){
                if($activo->software){
                    return $activo->software->nombre_software;
                }else{
                    return $activo->hardware->marca;
                }

            })
            ->addColumn('campo2',function($activo){
                if($activo->software){
                    return $activo->software->arquitectura;
                }else{
                    return $activo->hardware->modelo;
                }
            })
            ->addColumn('campo3',function($activo){
                if($activo->software){
                    return $activo->software->service_pack;
                }else{
                    return $activo->hardware->num_serie;
                }
            })
            ->addColumn('campo4',function($activo){
                if($activo->software){
                    return $activo->software->service_pack;
                }else{
                    return $activo->hardware->num_serie;
                }
            })
            ->addColumn('tipoactivo',function($activo){
                if($activo->software){
                    return 'Software';
                }else{
                    return 'Hardware';
                }
            })
            ->make(true);
    }
}
