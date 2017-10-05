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
                <form action="{{route("activo.store")}}" class="form-group" method="post">
                    {{csrf_field()  }}
                    <div class="form-group">
                        <label>Seleccione Personal</label>
                        <select class="input-sm form-control select2" name="personal">
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
                            <table id="table-activos" class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Tipo Activo</th>
                                    <th>SOftware/Marca</th>
                                    <th>Arquitecura / Modelo</th>
                                    <th>Service Pack / Num. Serie</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block btn-sm">Asignar</button>

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

    <script>
        //var template = Handlebars.compile($("#details-template").html());

        var table = $('#table-activos').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route('getdataactivo')}}',
            columns: [
                {
                    data:'idactivo',
                    render: function(data, type, row){

                            return '<input type="checkbox" id="inputUnchecked" name="activo[]" value="'+data+'"/>';
                    },
                    orderable:false,
                    searchable:false
                },
                //{ data: 'idactivo',"defaultContent": "<input type='checkbox' name='activo[]' >",orderable:false,searchable:false },
                {data: 'tipoactivo', name: 'tipoactivo'},
                {data: 'campo1', name: 'campo1'},
                {data: 'campo2', name: 'campo2'},
                {data: 'campo3', name: 'campo3'}
            ],
            order: [[0, 'desc']],
            "language": {
                "url": "{{asset("plugins/datatables/Spanish.json")}}"
            }
        });

        // Add event listener for opening and closing details
       /* $('#users-table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( template(row.data()) ).show();
                tr.addClass('shown');
            }
        });*/
    </script>

@endsection