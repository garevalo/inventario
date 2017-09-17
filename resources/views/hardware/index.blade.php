@extends('back.app')

@section('title')Módulo de Hardware @endsection

@section('head')
    @parent
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('menu-h1')
    <h1>
        <i class="fa fa-users"></i>  Hardware &nbsp;&nbsp;

        <a href="http://crudbooster.app/admin/customers?m=3" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
            <i class="fa fa-table"></i> Ver
        </a>


        <a href="{{route('hardware.create')}}" class="btn btn-sm btn-success" title="Add Data">
            <i class="fa fa-plus-circle"></i> Nuevo Hardware
        </a>

    </h1>
@endsection

@section('content')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sedes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sede</th>
                        <th>Dirección</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>

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