<html>

<table>
	<thead>
		<tr>
			<th>Sede</th>
			<th >Gerencia</th>
			<th >Sub Gerencia</th>
			<th >Marca</th>
			<th >Modelo</th>
			<th >Num. Serie</th>
			<th >Código Inventario</th>
			<th>Descripción</th>
		</tr>
	</thead>

	<tbody>
	@foreach( $data as $val )
		<tr>
			<td>{{$val->gerencia}}</td>
			<td>{{$val->gerencia}}</td>
			<td>{{$val->gerencia}}</td>
			<td>{{$val->marca}}</td>
			<td>{{$val->modelo}}</td>
			<td>{{$val->num_serie}}</td>
			<td>{{$val->cod_inventario}}</td>
			<td>{{$val->descripcion}}</td>
		</tr>
	@endforeach

	</tbody>
</table>

</html>
