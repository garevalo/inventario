@extends('back.app')

@section('title','Registrar Subgerencia')

@section('header')
    @parent()
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@endsection
@section('content')

    <div class="col-xs-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Registrar Hardware</h3>
            </div>


            <form method="POST" action="{{route('hardware.store')}}">

                {{csrf_field()}}
                <div class="box-body">

                    <div class="form-group {{ $errors->has('sede') ? ' has-error' : '' }}">
                        <label>Tipo Sftware:</label>
                        <select name="tipo_hardware" id="tipo_hardware" class="form-control">
                            <option>Seleccione Tipo</option>
                            <option value="">Sistema Operativo</option>
                            <option value="">Antivirus</option>
                            <option value="">Diseño</option>
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('marca') ? ' has-error' : '' }}">
                        <label>Nombre Software:</label>

                        <input type="text" class="form-control" name="software" id="software" value="{{old('software')}}" required>
                        {!! $errors->first('software','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('arquitectura') ? ' has-error' : '' }}">
                        <label>Arquitectura:</label>

                        <input type="text" class="form-control" name="arquitectura" id="arquitectura" value="{{old('arquitectura')}}" required>
                        {!! $errors->first('arquitectura','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('service_pack') ? ' has-error' : '' }}">
                        <label>Service Pack:</label>

                        <input type="text" class="form-control" name="service_pack" id="service_pack" value="{{old('service_pack')}}" required>
                        {!! $errors->first('service_pack','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('service_pack') ? ' has-error' : '' }}">
                        <label>Fecha Adquisición:</label>

                        <input type="text" class="form-control datepicker" name="fecha_adquisicion" id="fecha_adquisicion" value="{{old('fecha_adquisicion')}}" required>
                        {!! $errors->first('fecha_adquisicion','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            <!-- /.box-body -->
        </div>

    </div>

@endsection

@section('javascript')
    @parent()
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        })
    </script>
@endsection