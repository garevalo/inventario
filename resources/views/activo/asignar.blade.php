@extends('back.app')

@section('title')Módulo de Activos @endsection

@section('head')
    @parent
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection


@section('content')

    <div class="col-xs-12">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <form action="" class="form-group">
                    <div class="form-group">
                        <label>Seleccione Personal</label>
                        <select class="input-sm form-control select2">
                            @foreach($personals as $personal)
                                <option value="{{$personal->idpersonal}}">{{$personal->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Activos</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Fecha de adquision</th>
                                    <th>Personal</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>


                    <input type="button" value="Asignar" class="btn btn-success btn-block btn-sm">

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
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function(){
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>

@endsection