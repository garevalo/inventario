<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;
use DB;
use Carbon\Carbon;
use App\Activo;
use App\Personals_activos;
use App\Sede;
use App\Gerencia;
use App\Subgerencia;

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
            from (
             select activos_id, 
            (select personals_idpersonal from personals_activos b where a.activos_id=b.activos_id order by activos_id desc limit 1) personals_idpersonal
            from personals_activos a
            group by activos_id
            order by activos_id desc
             ) pa
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
        return $pdf->download();
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
            from (
             select activos_id, 
            (select personals_idpersonal from personals_activos b where a.activos_id=b.activos_id order by activos_id desc limit 1) personals_idpersonal
            from personals_activos a
            group by activos_id
            order by activos_id desc
             ) pa
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
        return $pdf->download();
    }


    public function ActivosOperativos(){

        $sedes = Sede::all();
        $gerencias = Gerencia::all();
        $subgerencias = Subgerencia::all();

        return view('reportes.FrmActivosOperativos',compact('sedes','gerencias','subgerencias'));

    }

    public function ActivosOperativosProcesar(Request $request){

          $sede         = $request->idsede_personal;
          $gerencia     = $request->idgerencia_personal;
          $subgerencia  = $request->idsubgerencia_personal;
          $estado       = $request->estado; /* 1 operativo 2 inoperativo*/
          $exportar     = $request->exportar;

          $data = $this->getActivosOperativos($sede,$gerencia,$subgerencia,$estado);
          //dd($data);

          if(!empty($data)){
            if($exportar==1){
                $this->export($data);
            } else{
                return $this->export($data,'pdf');
            }
          }
          else{
            echo "<script>alert('No hay datos'); document.location='".route('reportes-operativos')."';</script>";
          }
          

    }

    public function getActivosOperativos($sede=null,$gerencia=null,$subgerencia=null,$estado=1){

        $sql = "select  idgerencia_personal,
            (select gerencia from gerencias g where g.idgerencia=p1.idgerencia_personal ) as gerencia,
            (select subgerencia from subgerencias sg where sg.idsubgerencia=p1.idsubgerencia_personal ) as subgerencia,
            (select sede from sedes s where s.idsede=p1.idsede_personal ) as sede,
            concat(p1.nombres,' ',p1.apellido_paterno,' ',p1.apellido_materno) personal, 
            pa.*,h.*
            from (
             select activos_id, 
            (select personals_idpersonal from personals_activos b where a.activos_id=b.activos_id order by activos_id desc limit 1) personals_idpersonal
            from personals_activos a
            group by activos_id
            order by activos_id desc
             ) pa
            join activos on activos_id = activos.idactivo
            join personals p1 on pa.personals_idpersonal = p1.idpersonal
            join hardwares h on h.id_activo_hardware = pa.activos_id
            where activos.tipo_activo={$estado}";

        $sqlwhere="";

        if(!empty($sede) )
            $sqlwhere .= " and p1.idsede_personal = {$sede}";

        if(!empty($gerencia) )
            $sqlwhere .= " and p1.idgerencia_personal = {$gerencia}";

        if(!empty($subgerencia) )
            $sqlwhere .= " and p1.idsubgerencia_personal = {$subgerencia}";

        //return $sql.$sqlwhere;  
        return $activos = DB::select(DB::raw($sql.$sqlwhere));

    }

    public function export($data,$type="excel"){

        if($type=="pdf"){

            $pdf = PDF::loadView('reportes.excel.ActivosOperativos',array('data'=>$data));
            return $pdf->download();

        } elseif($type=="excel"){
            Excel::create('reporte', function($excel) use ($data) {
                $excel->sheet('reporte', function($sheet) use ($data) {
                    //dd($activos);
                    $sheet->loadView('reportes.excel.ActivosOperativos',array('data'=>$data) );
                });
            })->export('xlsx');
        }
    }


    public function ActivosVencidos(){


        $sedes = Sede::all();
        $gerencias = Gerencia::all();
        $subgerencias = Subgerencia::all();

        return view('reportes.FrmActivosVencidos',compact('sedes','gerencias','subgerencias'));
        //return view('reportes.FrmActivosOperativos');

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
