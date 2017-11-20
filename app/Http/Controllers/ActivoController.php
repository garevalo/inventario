<?php

namespace App\Http\Controllers;

use App\TipoHardware;
use Illuminate\Http\Request;
use App\Activo;
use App\Personal;
use App\Personals_activos;

use Datatables;
use DB;
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

        //dd($request->all());

        if(!isset($request->activo) || count($request->activo)==0 ){
            return "<script>alert('seleccione al menos un activo'); document.location = '/activo/asignar' </script>";
        }
        else{
           foreach ($request->activo as $activo){
                Personals_activos::create(['activos_id'=>$activo,
                                           'personals_idpersonal'=>$request->personal,
                                            'fecha_asignacion'=> date('Y-m-d') ]);

                Activo::FindOrFail($activo)->update(['asignado'=> 1]);
            }

            return redirect()->route('activo.index'); 
        }
        

    }

    public function seguimiento(){
       
        return view('activo.seguimiento');
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


    public function reasignar(Request $request,$id){

        Activo::FindOrFail($id)->update(['asignado'=>0]);
        
        return redirect()->route('activo.index');
    }


    public function verseguimiento(Request $request,$id){

        $activos = Personals_activos::FindOrFail($id)
                    //->join('')
                    ->get();

        dd($activos);

    }


    public function getRowDetailsDataActivo()
    {
        $activos = Activo::leftjoin('hardwares', 'activos.idactivo', '=', 'hardwares.id_activo_hardware')
            ->leftjoin('softwares', 'activos.idactivo', '=', 'softwares.id_activo_software')
            ->select('*',
                DB::raw('(select tipo_software from tipo_softwares ts where ts.id_tipo_software=softwares.idtipo_software) as tipo_software'),
                DB::raw('(select tipo_hardware from tipo_hardwares th where th.id_tipo_hardware=hardwares.idtipo_hardware) tipo_hardware')
            )

            ->whereNull('asignado')
            ->orWhere('asignado','0')
            ->get();


        return Datatables::of($activos)

            ->addColumn('campo1',function($activo){
                if($activo->idsoftware){
                    return $activo->nombre_software;
                }else{
                    return $activo->marca;
                }
            })
            ->addColumn('campo2',function($activo){
                if($activo->idsoftware){
                    return $activo->arquitectura;
                }else{
                    return $activo->modelo;
                }
            })
            ->addColumn('campo3',function($activo){
                if($activo->idsoftware){
                    return $activo->service_pack;
                }else{
                    return $activo->num_serie;
                }
            })
            ->addColumn('campo4',function($activo){
                if($activo->idsoftware){
                    return $activo->tipo_software;
                }else{
                    return $activo->tipo_hardware;
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

    public function getRowDetailsDataAll()
    {

         $activos = DB::select(
            DB::raw('select 
            personals_idpersonal, `personals`.*, `activos`.*, `activos`.`updated_at` as `fecha_asignacion`, 
            (select gerencia from gerencias g where g.idgerencia=personals.idgerencia_personal ) as gerencia, 
            (select subgerencia from subgerencias sg where sg.idsubgerencia=personals.idsubgerencia_personal) subgerencia, 
            (select sede from sedes where sedes.idsede=personals.idsede_personal) sede, 
            (
            select concat("<label class=\"label label-primary\">Tipo Software:</label> ", tipo_softwares.tipo_software,"<br>","Nombre: ",softwares.nombre_software,", Arquitectura: ",softwares.arquitectura,",<br> Service Pack: ",softwares.service_pack) from softwares 
            join tipo_softwares on id_tipo_software=idtipo_software
            where softwares.id_activo_software=activos.idactivo
            ) software,
             (
             select concat("<label class=\"label label-info\">Tipo Hardware:</label> ", tipo_hardwares.tipo_hardware,"<br>","Marca: ",hardwares.marca,", Modelo: ",hardwares.modelo,"<br> Num. Serie: ",hardwares.num_serie,"<br> Cod. Inventario: ",ifnull(hardwares.cod_inventario,"--")) 
             from hardwares 
             join tipo_hardwares on id_tipo_hardware = idtipo_hardware
             where hardwares.id_activo_hardware=activos.idactivo
            ) hardware

             from (
             select activos_id, 
            (select personals_idpersonal from personals_activos b where a.activos_id=b.activos_id order by activos_id desc limit 1) personals_idpersonal
            from personals_activos a
            group by activos_id
            order by activos_id desc
             ) personals_activos
             left join `activos` on `personals_activos`.`activos_id` = `activos`.`idactivo` 
             left join `personals` on `personals_activos`.`personals_idpersonal` = `personals`.`idpersonal` 
             where `activos`.`asignado` = 1 ')
         );

        return Datatables::of($activos)
            ->addColumn('nombres_personal',function($activo){
                return $activo->nombres.' '.$activo->apellido_paterno.' '.$activo->apellido_materno;
            })
            ->addColumn('tipo_activo',function($activo){
                if($activo->software)
                    return $activo->software;
                else
                    return $activo->hardware;
            })
            ->addColumn('nombre_tipo_activo',function($activo){
                if($activo->tipo_activo== 1)
                    return "Hardware";
                else
                    return "Software";
            })
            ->addColumn('fechaasignacion',function($activo){
                return $activo->fecha_asignacion;
            })
            ->addColumn('reasignar',function($activo){
                return '<a href="'.route('activo.reasignar',$activo->idactivo).'" class="btn btn-danger btn-xs" onclick="if(!confirm(\'¿Estas seguro de realizar está acción?\')) return false;"> <i class="fa fa-repeat"></i> Reasignar </a>';
            })
            ->rawColumns(['reasignar','tipo_activo'])
            ->make(true);
    }


    public function GetDataSeguimiento()
    {
        $activos = Activo::leftjoin('hardwares', 'activos.idactivo', '=', 'hardwares.id_activo_hardware')
            ->leftjoin('softwares', 'activos.idactivo', '=', 'softwares.id_activo_software')
            ->select('*',
                DB::raw('(select tipo_software from tipo_softwares ts where ts.id_tipo_software=softwares.idtipo_software) as tipo_software'),
                DB::raw('(select tipo_hardware from tipo_hardwares th where th.id_tipo_hardware=hardwares.idtipo_hardware) tipo_hardware')
            )
            ->get();


        return Datatables::of($activos)

            ->addColumn('campo1',function($activo){
                if($activo->idsoftware){
                    return $activo->nombre_software;
                }else{
                    return $activo->marca;
                }
            })
            ->addColumn('campo2',function($activo){
                if($activo->idsoftware){
                    return $activo->arquitectura;
                }else{
                    return $activo->modelo;
                }
            })
            ->addColumn('campo3',function($activo){
                if($activo->idsoftware){
                    return $activo->service_pack;
                }else{
                    return $activo->num_serie;
                }
            })
            ->addColumn('campo4',function($activo){
                if($activo->idsoftware){
                    return $activo->tipo_software;
                }else{
                    return $activo->tipo_hardware;
                }
            })
            ->addColumn('tipoactivo',function($activo){
                if($activo->software){
                    return 'Software';
                }else{
                    return 'Hardware';
                }
            })
            ->addColumn('seguimiento',function($activo){
                return "<a href='".route('activo.verseguimiento',$activo->idactivo)."' class='btn btn-primary btn-sm'><i class='fa fa-search'></i> Ver</a>";
            })
            ->rawColumns(['seguimiento'])
            ->make(true);
    }
}
