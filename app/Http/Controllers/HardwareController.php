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
        $hardwares = Hardware::with('tipohardware')->get();
        return view('hardware.index',compact('hardwares'));
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

    public function store(HardwareRequest $request)
    {
        $idactivo = Activo::insertGetId(['fecha_adquisicion'=> Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
            'tipo_activo'=>'1',
            'estado'=> $request->estado ])
        ;

        if($idactivo){
            $hardware = Hardware::create([
                "id_activo_hardware" => $idactivo,
                "idtipo_hardware" => $request->idtipo_hardware,
                "marca" => $request->marca,
                "modelo" => $request->modelo,
                "num_serie" => $request->num_serie,
                "cod_inventario" => $request->cod_inventario,
                "estado" => $request->estado,
                "fecha_adquisicion" => Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
                "capacidad" => $request->capacidad,
                "interfaz" => $request->interfaz,
                "tipo" => $request->tipo ]);
        }
        
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
        $hardware = Hardware::FindOrFail($id);
        $tipohardwares = TipoHardware::all();

        $estados = array(1=>'Bueno',2=>'Regular',3=>'Malo');
        return view('hardware.edit',compact('tipohardwares','estados','hardware'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HardwareRequest $request, $id)
    {
        Hardware::FindOrFail($id)->update(
            [
                "idtipo_hardware" => $request->idtipo_hardware,
                "marca" => $request->marca,
                "modelo" => $request->modelo,
                "num_serie" => $request->num_serie,
                "cod_inventario" => $request->cod_inventario,
                "estado" => $request->estado,
                "fecha_adquisicion" => Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
                "capacidad" => $request->capacidad,
                "interfaz" => $request->interfaz,
                "tipo" => $request->tipo ]
        );

        return redirect()->route('hardware.index');
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
