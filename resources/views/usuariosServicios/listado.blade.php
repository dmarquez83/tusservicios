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
                <div class="col-sm-6 border-right">
                    <a class="btn btn-primary" href="{!! route('solicitudes.getDetServicios', [$usuariosSolicitud->id_solicitud]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
