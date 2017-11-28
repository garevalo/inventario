<html>

<table>
	<tr align="center">
		<td colspan="10" ><h2>Reporte de Activos Vencidos</h2></td>
	</tr>	
</table>

<table border="1" cellpadding="2" cellspacing="0" width="100%" style="font-size: 8">
	
	<tr>
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