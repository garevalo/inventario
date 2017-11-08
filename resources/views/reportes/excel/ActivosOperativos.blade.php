{{dd($activos)}}
<table>
	<th>Gerencia</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>Num. Serie</th>
	<th>Código Inventario</th>
	<tbody>
		@foreach( $activos as $activo )
		<tr>
			<td>{{activo->gerencia}}</td>
			<td>{{activo->marca}}</td>
			<td>{{activo->modelo}}</td>
			<td>{{activo->num_serie}}</td>
			<td>{{activo->cod_inventario}}</td>
		</tr>
		@endforeach
		
	</tbody>
</table>