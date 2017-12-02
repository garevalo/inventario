<html>

<table>
	<tr align="center">
		<td colspan="10" ><h2>Reporte de Activos Por Personal</h2></td>
	</tr>	
</table>

<table border="1" cellpadding="2" cellspacing="0" width="100%" style="font-size: 8">
	
	<tr>
		<th width="5%">ID Activo</th>
		<th>Personal</th>
		<th>Sede</th>
		<th>Gerencia</th>
		<th>Sub Gerencia</th>
		<th>Activo</th>
		<th>Fecha Asignación</th>
		<th>Descripción</th>
		<th width="5%">Aginado</th>
	</tr>
	

	<tbody>
	@foreach( $data as $val )
		<tr>
			<td>{{$val->idactivo}}</td>
			<td>{{$val->nombres .' '.$val->apellido_paterno.' '.$val->apellido_materno}}</td>
			<td>{{$val->sede}}</td>
			<td>{{$val->gerencia}}</td>
			<td>{{$val->subgerencia}}</td>
			<td> @if($val->software) {{ $val->software}} @else {{$val->hardware }} @endif </td>
			<td>{{$val->fecha_asignacion}}</td>
			<td>{{$val->descripcion}}</td>
			<td> @if($val->asignado==1) Sí @else No @endif </td>
		</tr>
	@endforeach

	</tbody>
</table>

</html>