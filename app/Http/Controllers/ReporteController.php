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
        $activos = Personals_activos::leftjoin('activos', 'personals_activos.activos_id', '=', 'activos.idactivo')
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
            ->get();

        dd($activos);
        $data = array(
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'result' => $result,
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
        $pdf = PDF::loadView('reportes.licenciapagadas');
        return $pdf->stream();
    }

}
