@extends('back.app')
@section('title')Reporte Activos Obsoletos @endsection
@section('content')

    <div class="col-xs-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Reporte Licencias Pagadas</h3>
            </div>

            <form method="POST" action="{{url('reporte/veractivosobsoletos')}}">

                {{csrf_field()}}
                <div class="box-body">

                    <div class="form-group-sm {{ $errors->has('desde') ? ' has-error' : '' }}">
                        <label>Desde:</label>
                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="desde" id="desde" required>
                        {!! $errors->first('desde','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group-sm {{ $errors->has('hasta') ? ' has-error' : '' }}">
                        <label>Hasta:</label>
                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="hasta" id="hasta" required>
                        {!! $errors->first('hasta','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ver Reporte</button>
                </div>
            </form>
            <!-- /.box-body -->
        </div>

    </div>
@endsection

@section('javascript')
    @parent()

    <!-- InputMask -->
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <script>
        $(function () {
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();
        });
    </script>

@endsection