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

        //dd($request->activo);
        foreach ($request->activo as $activo){
            Personals_activos::create(['activos_id'=>$activo,
                                       'personals_idpersonal'=>$request->personal,
                                        'fecha_asignacion'=> date('Y-m-d') ]);

            Activo::FindOrFail($activo)->update(['asignado'=> 1]);
        }

        return redirect()->route('activo.index');

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
        $activos = Personals_activos::leftjoin('activos', 'personals_activos.activos_id', '=', 'activos.idactivo')
            ->leftjoin('personals', 'personals_activos.personals_idpersonal', '=', 'personals.idpersonal')
            ->select(
                DB::raw('distinct(personals_activos.activos_id)'),
                'personals.*','activos.*',
                'activos.updated_at as fecha_asignacion',
                DB::raw('(select gerencia from gerencias g where g.idgerencia=personals.idgerencia_personal ) as gerencia'),
                DB::raw('(select subgerencia from subgerencias sg where sg.idsubgerencia=personals.idsubgerencia_personal) subgerencia'),
                DB::raw('(select sede from sedes  where sedes.idsede=personals.idsede_personal) sede'),
                DB::raw('(select concat("Nombre: ",softwares.nombre_software,", Arquitectura: ",softwares.arquitectura,", Service Pack: ",softwares.service_pack) from softwares  where softwares.id_activo_software=activos.idactivo) software'),
                DB::raw('(select concat("Marca: ",hardwares.marca,", Modelo: ",hardwares.modelo,", Num. Serie: ",hardwares.num_serie,", Cod. Inventario: ",ifnull(hardwares.cod_inventario,"--")) from hardwares  where hardwares.id_activo_hardware=activos.idactivo) hardware')
            )
            ->get();

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
                return '<a href="#" class="btn btn-danger btn-xs"> <i class="fa fa-repeat"></i> Reasignar </a>';
            })
            ->rawColumns(['reasignar'])
            ->make(true);
    }
}
