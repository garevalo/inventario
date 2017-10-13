<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Carbon\Carbon;
use App\Activo;
use App\Personals_activos;

class ReporteController extends Controller
{

    public function ActivosObsoletos(){
       return view('reportes.frmactivosobsoletos');
    }

    public function ActivosObsoletosPdf(Request $request)
    {
        /*$activos = Personals_activos::leftjoin('activos', 'personals_activos.activos_id', '=', 'activos.idactivo')
            ->leftjoin('personals', 'personals_activos.personals_idpersonal', '=', 'personals.idpersonal')
            //->groupBy('personals.idgerencia_personal')
            ->select(
                DB::raw('distinct(personals_activos.activos_id)'),
                'personals.*','activos.*',
                DB::raw('(select gerencia from gerencias g where g.idgerencia=personals.idgerencia_personal ) as gerencia'),
                DB::raw('(select subgerencia from subgerencias sg where sg.idsubgerencia=personals.idsubgerencia_personal) subgerencia'),
                DB::raw('(select sede from sedes  where sedes.idsede=personals.idsede_personal) sede'),
                DB::raw('(select concat("Nombre: ",softwares.nombre_software,", Arquitectura: ",softwares.arquitectura,", Service Pack: ",softwares.service_pack) from softwares  where softwares.id_activo_software=activos.idactivo) software'),
                DB::raw('(select concat("Marca: ",hardwares.marca,", Modelo: ",hardwares.modelo,", Num. Serie: ",hardwares.num_serie,", Inventario: ",hardwares.cod_inventario) from hardwares  where hardwares.id_activo_hardware=activos.idactivo) hardware')
            )
            ->where('activos.tipo_activo','1')
            ->get();*/

       $activos = DB::select(DB::raw('select  idgerencia_personal,
            (select gerencia from gerencias g where g.idgerencia=p1.idgerencia_personal ) as gerencia,
            count(activos.idactivo) total_activos,            
            (
            select count(pa2.activos_id) from personals_activos pa2
            join activos   on pa2.activos_id = activos.idactivo
            join personals on pa2.personals_idpersonal = personals.idpersonal
            where (TIMESTAMPDIFF(YEAR,fecha_adquisicion , CURDATE()))>=4 and p1.idgerencia_personal = personals.idgerencia_personal
            ) activos_obsoletos
            from (select distinct(activos_id) idactivo_unico,personals_activos.* from personals_activos ) pa
            join `activos` on `activos_id` = `activos`.`idactivo` 
            join personals p1 on pa.personals_idpersonal = p1.idpersonal
            where activos.tipo_activo=1
            group by p1.idgerencia_personal'));


        $data = array(
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'activos' => $activos,
        );



        $pdf = PDF::loadView('reportes.activosobsoletospdf',$data);
        return $pdf->stream();
    }

    public function LicenciasPagadas()
    {
        return view('reportes.frmlicencias');

    }

    public function LicenciasPagadasPdf(Request $request)
    {
        $activos = DB::select(DB::raw('select  idgerencia_personal,
            (select gerencia from gerencias g where g.idgerencia=p1.idgerencia_personal ) as gerencia,
            count(activos.idactivo) licencias_usadas,            
            (
            select count(pa2.activos_id) from personals_activos pa2
            join personals on pa2.personals_idpersonal = personals.idpersonal
            join softwares on id_activo_software = pa2.activos_id
            where  licencia=1 and p1.idgerencia_personal = personals.idgerencia_personal
            ) licencias_pagadas
            from (select distinct(activos_id) idactivo_unico,personals_activos.* from personals_activos ) pa
            join `activos` on `activos_id` = `activos`.`idactivo` 
            join personals p1 on pa.personals_idpersonal = p1.idpersonal
            where activos.tipo_activo=2
            group by p1.idgerencia_personal'));

        //dd($activos);
        $data = array(
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'activos' => $activos,
        );

        $pdf = PDF::loadView('reportes.licenciapagadas',$data);
        return $pdf->stream();
    }

}
