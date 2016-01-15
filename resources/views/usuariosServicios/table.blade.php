<table class="table">
    <thead>

			<th>Usuario</th>
			<th>Servicio</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($usuariosServicios as $usuariosServicios)
        <tr>
            <td>{!! $usuariosServicios->name !!}</td>
			<td>{!! $usuariosServicios->nombre !!}</td>
            <td>
                <a href="{!! route('usuario.servicios.edit', [$usuariosServicios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuario.servicios.delete', [$usuariosServicios->id]) !!}" onclick="return confirm('Are you sure wants to delete this UsuariosServicios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
