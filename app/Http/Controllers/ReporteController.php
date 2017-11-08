<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;
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


    public function ActivosOperativos(){

        return view('reportes.FrmActivosOperativos');

    }

    public function getActivosOperativos($sede=null,$gerencia=null,$subgerencia=null,$estado=1){

        $sql = 'select  idgerencia_personal,
            (select gerencia from gerencias g where g.idgerencia=p1.idgerencia_personal ) as gerencia,pa.*,h.*
            from (select distinct(activos_id) idactivo_unico,personals_activos.* from personals_activos ) pa
            join activos on activos_id = activos.idactivo
            join personals p1 on pa.personals_idpersonal = p1.idpersonal
            join hardwares h on h.id_activo_hardware = pa.activos_id
            where activos.tipo_activo=1';

        
        if($sede)
            $sqlwhere = " and p1.idsede_personal = " ;   


        $activos = DB::select(DB::raw($sql));


        Excel::create('Filename', function($excel) use ($activos) {
            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                  ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

            $excel->sheet('Sheetname', function($sheet) use ($activos) {
                //dd($activos);
                $sheet->loadView('reportes.excel.ActivosOperativos',array('activos'=>$activos));
            });
        })->export('xls');
       // return $activos;

    }


    public function ActivosVencidos(){

        return view('reportes.FrmActivosOperativos');

    }

    public function getActivosVencidos(){

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

        return $activos;

    }

}
