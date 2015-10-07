<table class="table">
    <thead>
    <th>Descripcion</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Horas</th>
			<th>Id Servicio</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitudes)
        <tr>
            <td>{!! $solicitudes->descripcion !!}</td>
			<td>{!! $solicitudes->fecha !!}</td>
			<td>{!! $solicitudes->hora !!}</td>
			<td>{!! $solicitudes->direccion !!}</td>
			<td>{!! $solicitudes->telefono !!}</td>
			<td>{!! $solicitudes->horas !!}</td>

			<td>{!! $solicitudes->id_servicio !!}</td>
            <td>
                <a href="{!! route('solicitudes.edit', [$solicitudes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('solicitudes.delete', [$solicitudes->id]) !!}" onclick="return confirm('Are you sure wants to delete this Solicitudes?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
