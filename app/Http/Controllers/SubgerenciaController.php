<?php

namespace App\Http\Controllers;

use App\Http\Requests\SgMessageRequest;
use App\Subgerencia;
use Illuminate\Http\Request;


class SubgerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subgerencias = Subgerencia::all();
        return view('subgerencia.index',['subgerencias'=>$subgerencias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subgerencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SgMessageRequest $request)
    {
        Subgerencia::create($request->all());

       return redirect()->route('subgerencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subgerencia = Subgerencia::FindOrFail($id);

        return view("subgerencia.edit",['subgerencia'=>$subgerencia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SgMessageRequest $request, $id)
    {

        Subgerencia::FindOrFail($id)->update($request->all());

        return redirect()->route('subgerencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Subgerencia::FindOrFail($id)->delete();

        return redirect()->route('subgerencia.index');
    }
}
