<?php

namespace App\Http\Controllers;

use App\Http\Requests\HardwareRequest;
use App\TipoHardware;
use App\Hardware;
use App\Activo;
use Carbon\Carbon;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hardware.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipohardware = TipoHardware::all();
        $estados = array(1=>'Bueno',2=>'Regular',3=>'Malo');
        return view('hardware.create',compact('tipohardware','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HardwareRequest $request)
    {
        $activo = Activo::create(['fecha_adquisicion'=> Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
                                  'estado'=> $request->estado ]);
        
        $hardware = Hardware::create([
                "id_activo_hardware" => $activo->idactivo,
                "idtipo_hardware" => $request->idtipo_hardware,
                "marca" => $request->marca,
                "modelo" => $request->modelo,
                "num_serie" => $request->num_serie,
                "cod_inventario" => $request->cod_inventario,
                "estado" => $request->estado,
                "fecha_adquisicion" => Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
                "capacidad" => $request->capacidad,
                "interfaz" => $request->interfaz,
                "tipo_componente" => $request->tipo_componente ]);

        return redirect()->route('hardware.index');
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
}
