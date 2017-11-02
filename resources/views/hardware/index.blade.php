@extends('back.app')

@section('title')Módulo de Hardware @endsection

@section('head')
    @parent
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('menu-h1')
    <h1>
        <i class="fa fa-microchip"></i>  Listado de Activos Hardware &nbsp;&nbsp;
        <a href="{{route('hardware.create')}}" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Nuevo Hardware
        </a>

    </h1>
@endsection

@section('content')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hardware</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-condensed table-bordered table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <td>Tipo</td>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Num.Serie</th>
                        <th>Cod. Inventario</th>
                        <th>Fec. Adquision</th>
                        <th>Estado</th>
                        <th>Estado Activo</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hardwares as $hardware)
                    <tr>
                        <td>{{$hardware->idhardware}}</td>
                        <td>{{$hardware->tipohardware->tipo_hardware}}</td>
                        <td>{{$hardware->marca}}</td>
                        <td>{{$hardware->modelo}}</td>
                        <td>{{$hardware->num_serie}}</td>
                        <td>{{$hardware->cod_inventario}}</td>
                        <td>{{$hardware->fecha_adquisicion->format('d-m-Y')}}</td>
                        <td>{{$hardware->estado}}</td>
                        <td>
                            @if($hardware->activo->estado_activo==1) <span class="label label-success">Activo</span>
                            @elseif($hardware->activo->estado_activo==2) <span class="label label-danger">De Baja</span>
                            @else <span class="label label-warning">Devuelto </span>@endif </td>
                        <td><a href="{{route('hardware.edit',$hardware->idhardware)}}" class="btn btn-primary btn-sm">Editar</a></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>

@endsection

@section('javascript')
    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->

    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>

@endsection