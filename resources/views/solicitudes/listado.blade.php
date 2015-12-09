<table class="table">
    <thead>
    <th>Valor</th>
			<th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitud)
        <tr>
            <td>{!! $solicitud->descripcion !!}</td>
			<td>{!! $solicitud->direccion !!}</td>
            <td>
                <a href="{!! route('evaluaciones.edit', [$solicitud->id]) !!}"><i class="glyphicon glyphicon-log-in"></i></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
