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
                        <select name="tipo_hardware" id="tipo_hardware" class="form-control">
                            <option>CPU</option>
                            <option value="">Monitor</option>
                            <option value="">Mouse</option>
                            <option value="">Teclado</option>
                        </select>
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

                    <div class="form-group {{ $errors->has('numserie') ? ' has-error' : '' }}">
                        <label>Número Serie:</label>

                        <input type="text" class="form-control" name="numserie" id="numserie" value="{{old('numserie')}}" required>
                        {!! $errors->first('numserie','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('cod_inventario') ? ' has-error' : '' }}">
                        <label>Código Inventario:</label>

                        <input type="text" class="form-control" name="cod_inventario" id="cod_inventario" value="{{old('cod_inventario')}}" required>
                        {!! $errors->first('cod_inventario','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
                        <label>Estado:</label>

                        <select name="estado_hardware" id="" class="form-control">
                            <option value="">Estado</option>
                            <option value="bueno">Bueno</option>
                            <option value="regular">Regular</option>
                            <option value="malo">Malo</option>
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('capacidad') ? ' has-error' : '' }}">
                        <label>Capacidad:</label>

                        <input type="text" class="form-control" name="capacidad" id="capacidad" value="{{old('capacidad')}}" required>
                        {!! $errors->first('capacidad','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('interfaz') ? ' has-error' : '' }}">
                        <label>Interfaz:</label>

                        <input type="text" class="form-control" name="interfaz" id="interfaz" value="{{old('interfaz')}}" required>
                        {!! $errors->first('interfaz','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('tipocomponente') ? ' has-error' : '' }}">
                        <label>Tipo Componente:</label>

                        <input type="text" class="form-control" name="tipo_componente" id="tipo_componente" value="{{old('tipo_componente')}}" required>
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