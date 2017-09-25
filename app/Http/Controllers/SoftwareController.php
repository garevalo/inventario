<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoftwareRequest;
use App\Software;
use App\TipoSoftware;
use App\Activo;
use Carbon\Carbon;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwares = Software::with('tiposoftware')->get();
        //dd($softwares);
        return view("software.index",compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposoftwares = TipoSoftware::all();
        $estados = array(1=>'Bueno',2=>'Regular',3=>'Malo');
        return view("software.create",compact('tiposoftwares','estados'));
    }


    public function store(SoftwareRequest $request)
    {
        $activo = Activo::create(['fecha_adquisicion'=> Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion),
            'estado'=> $request->estado ]);

        $software = Software::create([
            "id_activo_software" => $activo->idactivo,
            "idtipo_software" => $request->idtipo_software,
            "arquitectura" => $request->arquitectura,
            "service_pack" => $request->service_pack,
            "fecha_adquision" => Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion)]);

        return redirect()->route('software.index');
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

    public function edit($id)
    {
        $software = Software::FindOrFail($id);
        $tiposoftwares = TipoSofware::all();
        $estados = array(1=>'Bueno',2=>'Regular',3=>'Malo');

        return view('sofware.edit',compact('tiposoftwares','estados','software'));
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
                "idtipo_software" => $request->idtipo_software,
                "arquitectura" => $request->arquitectura,
                "service_pack" => $request->service_pack,
                "fecha_adquision" => Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion)]
        );

        return redirect()->route('software.index');
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
