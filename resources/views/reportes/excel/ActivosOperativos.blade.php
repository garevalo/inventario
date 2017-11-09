<html>
<style type="text/css">
	table{
		font-size: 8px;
	}
</style>
<table border="0" cellpadding="2" cellspacing="0" >
	<thead>
		<tr style="background-color: #b9aeae; color: #fff;">
			<th>Sede</th>
			<th >Gerencia</th>
			<th >Sub Gerencia</th>
			<th >Marca</th>
			<th >Modelo</th>
			<th >Num. Serie</th>
			<th >Código Inventario</th>
			<th>Código Patrimonial</th>
			<th >Fecha de Adquisición</th>
			<th>Descripción</th>
		</tr>
	</thead>

	<tbody>
	@foreach( $data as $val )
		<tr>
			<td>{{$val->sede}}</td>
			<td>{{$val->gerencia}}</td>
			<td>{{$val->subgerencia}}</td>
			<td>{{$val->marca}}</td>
			<td>{{$val->modelo}}</td>
			<td>{{$val->num_serie}}</td>
			<td>{{$val->cod_inventario}}</td>
			<td>{{$val->codigo_patrimonial }}</td>
			<td>{{$val->fecha_adquisicion }}</td>
			<td>{{$val->descripcion}}</td>
		</tr>
	@endforeach

	</tbody>
</table>

</html>