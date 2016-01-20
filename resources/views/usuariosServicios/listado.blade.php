<table class="table">
    <thead>

			<th>servicio</th>
			<th>descripcion de la solicitud</th>
            <th>fecha</th>
            <th>direccion</th>
    <th width="50px">detalle</th>
    </thead>
    <tbody>
    @foreach($usuariosSolicitudes as $usuariosSolicitud)
        <tr>
            <td>{!! $usuariosSolicitud->nombre !!}</td>
			<td>{!! $usuariosSolicitud->descripcion !!}</td>
            <td>{!! $usuariosSolicitud->fecha !!}</td>
            <td>{!! $usuariosSolicitud->direccion !!}</td>
            <td>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
