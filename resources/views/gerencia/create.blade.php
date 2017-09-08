@extends('back.app')

@section('title','Registrar Gerencia')

@section('content')

<div class="col-xs-12">

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Gerencia</h3>
        </div>

        <form method="POST" action="{{route('gerencia.store')}}">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="form-group {{ $errors->has('gerencia') ? ' has-error' : '' }}">
                <label>Gerencia:</label>
                <input type="text" class="form-control" name="gerencia" id="gerencia" value="{{old('gerencia')}}" required>
                {!! $errors->first('gerencia','<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('idsede') ? 'has-error' : '' }}">
                <label>Sede:</label>
                <select class="form-control" name="idsede" id="idsede" required>
                    <option value="">Seleccione Sede</option>
                    @foreach($sedes as $sede)
                        <option value="{{$sede->idsede}}">{{$sede->sede}}</option>
                    @endforeach
                </select>
                {!! $errors->first('idsede','<span class="help-block">:message</span>') !!}
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