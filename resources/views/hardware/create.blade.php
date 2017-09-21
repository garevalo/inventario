@extends('back.app')

@section('title','Registrar Subgerencia')

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
                        <label>Tipo:</label>
                        <select name="id_tipo_hardware" id="id_tipo_hardware" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($tipohardware as $hardware)
                                <option value="{{$hardware->id_tipo_hardware}}">{{$hardware->tipo_hardware}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_tipo_hardware','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('marca') ? ' has-error' : '' }}">
                        <label>Marca:</label>

                        <input type="text" class="form-control" name="marca" id="marca" value="{{old('marca')}}" required>
                        {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('modelo') ? ' has-error' : '' }}">
                        <label>Modelo:</label>

                        <input type="text" class="form-control" name="modelo" id="modelo" value="{{old('modelo')}}" required>
                        {!! $errors->first('modelo','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('num_serie') ? ' has-error' : '' }}">
                        <label>Número Serie:</label>

                        <input type="text" class="form-control" name="num_serie" id="num_serie" value="{{old('num_serie')}}">
                        {!! $errors->first('num_serie','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('cod_inventario') ? ' has-error' : '' }}">
                        <label>Código Inventario:</label>

                        <input type="text" class="form-control" name="cod_inventario" id="cod_inventario" value="{{old('cod_inventario')}}">
                        {!! $errors->first('cod_inventario','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
                        <label>Estado:</label>

                        <select name="estado" id="" class="form-control">
                            <option value="">Estado</option>
                            <option value="1">Bueno</option>
                            <option value="2">Regular</option>
                            <option value="3">Malo</option>
                        </select>
                        {!! $errors->first('estado','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('capacidad') ? ' has-error' : '' }}">
                        <label>Capacidad:</label>

                        <input type="text" class="form-control" name="capacidad" id="capacidad" value="{{old('capacidad')}}">
                        {!! $errors->first('capacidad','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('interfaz') ? ' has-error' : '' }}">
                        <label>Interfaz:</label>

                        <input type="text" class="form-control" name="interfaz" id="interfaz" value="{{old('interfaz')}}" >
                        {!! $errors->first('interfaz','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('tipocomponente') ? ' has-error' : '' }}">
                        <label>Tipo Componente:</label>

                        <input type="text" class="form-control" name="tipo_componente" id="tipo_componente" value="{{old('tipo_componente')}}" >
                        {!! $errors->first('tipo_componente','<span class="help-block">:message</span>') !!}
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