@extends('back.app')

@section('title')Módulo de Asignación @endsection

@section('head')
    @parent
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection
@section('menu-h1')
    <h1>
        <i class="fa fa-microchip"></i>  Módulo de Asignación &nbsp;&nbsp;

        <a href="{{route('reporte.personal')}}" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Registrar Hardware
        </a>

        <a href="{{route('software.create')}}" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Registrar Sofware
        </a>
        <a href="{{route('activo.index')}}" class="btn btn-sm btn-primary" title="Asignar Activos">
            <i class="fa  fa-reply"></i> Regresar
        </a>
    </h1>
@endsection

@section('content')

    <div class="col-xs-12">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{route("reporte.personal")}}" class="form-group" method="post" target="_blank">
            
                        {{csrf_field()  }}
                        <div class="form-group">
                            <label>Seleccione Personal</label>
                            <select class="input-sm form-control select2" name="personal">
                                @foreach($personals as $personal)
                                    <option value="{{$personal->idpersonal}}">{{$personal->nombres.' '.$personal->apellido_paterno.' '.$personal->apellido_materno }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group-sm {{ $errors->has('hasta') ? ' has-error' : '' }}">
	                         <label>Exportar a :</label>
	                        <div class="radio">
	                            <label for="">
	                                <input type="radio" name="exportar" value="1" checked > <i class="fa fa-file-excel-o" ></i> Excel
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label for="">
	                                <input type="radio" name="exportar" value="2" > <i class="fa fa-file-pdf-o"></i> PDF
	                            </label>
	                        </div>
	                    </div>

  						<div class="form-group-sm">
		                    <button type="submit" class="btn btn-primary">Exportar </button>
		                </div>
                    	                    
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>

@endsection

@section('javascript')
    @parent()

    <!-- Select2 -->
    <script src="{{asset('plugins/select2/select2.full.js')}}"></script>

@endsection