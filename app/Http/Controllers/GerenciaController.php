<?php

namespace App\Http\Controllers;

use App\Gerencia;
use App\Http\Requests\GerenciaRequest;
use App\Sede;

class GerenciaController extends Controller
{

    public function index()
    {
        $gerencias = Gerencia::all();
        return view('gerencia.index',['gerencias'=>$gerencias]);
    }


    public function create()
    {
        $sedes = Sede::all();
        return view('gerencia.create',compact('sedes'));
    }


    public function store(GerenciaRequest $request)
    {
        dd($request->all());
        Gerencia::create($request->all());

        return redirect()->route('gerencia.index');
    }


    public function show($id)
    {
        return $id;
    }


    public function edit($id)
    {
        $gerencia = Gerencia::FindOrFail($id);

        return view("gerencia.edit",['gerencia'=>$gerencia]);
    }


    public function update(Gerencia $request, $id)
    {

        Gerencia::FindOrFail($id)->update($request->all());

        return redirect()->route('gerencia.index');
    }


    public function destroy($id)
    {

        Gerencia::FindOrFail($id)->delete();

        return redirect()->route('gerencia.index');
    }
}