@extends('back.app')

@section('title','Editar Tipo Software')

@section('header')
    @parent()
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@endsection
@section('content')

    <div class="col-xs-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Registrar Tipo Software</h3>
            </div>

            <form method="POST" action="{{route('tiposoftware.update',$tiposoftware->id_tipo_software)}}">

                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <div class="box-body">

                    <div class="form-group {{ $errors->has('tipo_software') ? ' has-error' : '' }}">
                        <label>Tipo Software:</label>

                        <input type="text" class="form-control input-sm" name="tipo_software" id="tipo_software" value="{{$tiposoftware->tipo_software}}" required>
                        {!! $errors->first('tipo_software','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
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