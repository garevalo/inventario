@extends('back.app')

@section('title','Editar Subgerencia')

@section('content')

    <div class="col-xs-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Registrar Subgerencia</h3>
            </div>
            <form method="POST" action="{{route('subgerencia.update',$subgerencia->idsubgerencia )}}">

                {{csrf_field()}}
                {!! method_field('PUT') !!}

                <div class="box-body">
                    <div class="form-group {{ $errors->has('subgerencia') ? ' has-error' : '' }}">
                        <label>Subgerencia:</label>

                        <input type="text" class="form-control" name="subgerencia" id="subgerencia" value="{{ (old('subgerencia'))? old('subgerencia'): $subgerencia->subgerencia  }}" required>
                        {!! $errors->first('subgerencia','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('idgerencia') ? 'has-error' : '' }}">
                        <label>Gerencia:</label>
                        <select class="form-control" name="idgerencia" id="idgerencia">
                            <option value="">Seleccione Gerencia</option>
                            @foreach($gerencias as $gerencia)
                                <option value="{{$gerencia->idgerencia}}" @if($gerencia->idgerencia==$subgerencia->idgerencia) selected @endif > {{$gerencia->gerencia}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('idgerencia','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>

    </div>

@endsection