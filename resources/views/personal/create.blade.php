@extends('back.app')

@section('title','Registrar Personal')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
@endsection

@section('content')

<div class="col-xs-12">

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Personal</h3>
        </div>


        <form method="POST" action="{{route('subgerencia.store')}}">

        {{csrf_field()}}
        <div class="box-body">

            <div class="form-group {{ $errors->has('nombres') ? ' has-error' : '' }}">
                <label>Nombres:</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="{{old('nombres')}}" required>
                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" value="{{old('apellido_paterno')}}" required>
                {!! $errors->first('apellido_paterno','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" value="{{old('apellido_materno')}}" required>
                {!! $errors->first('apellido_materno','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('dni') ? ' has-error' : '' }}">
                <label>DNI:</label>
                <input type="text" class="form-control" name="dni" id="dni" value="{{old('dni')}}" required>
                {!! $errors->first('dni','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('idcargo') ? 'has-error' : '' }}">
                <label>Cargo:</label>
                <select class="form-control" name="idcargo" id="idcargo">
                    <option value="">Seleccione Cargo</option>
                    @foreach($cargos as $cargo)
                        <option value="{{$cargo->idcargo}}">{{$cargo->cargo}}</option>
                    @endforeach
                </select>
                {!! $errors->first('idcargo','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('idsubgerencia') ? 'has-error' : '' }}">
                <label>Sub Gerencia:</label>
                <select class="form-control" name="idsubgerencia" id="idsubgerencia">
                    <option value="">Seleccione Subgerencia</option>
                    @foreach($subgerencias as $subgerencia)
                        <option value="{{$subgerencia->idsubgerencia}}">{{$subgerencia->subgerencia}}</option>
                    @endforeach
                </select>
                {!! $errors->first('idsubgerencia','<span class="help-block">:message</span>') !!}
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
    @parent
    <!-- Select2 -->
    <script src="{{asset('plugins/select2//select2.full.min.js')}}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
                $('.select2').select2();
        });
    </script>
@endsection


