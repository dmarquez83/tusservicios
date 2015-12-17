<table class="table">
    <thead>
    <th>Servicio Id</th>
			<th>Servicio Id</th>
			<th>User Id</th>
			<th>User Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($usuariosServicios as $usuariosServicios)
        <tr>
            <td>{!! $usuariosServicios->servicio_id !!}</td>
			<td>{!! $usuariosServicios->servicio_id !!}</td>
			<td>{!! $usuariosServicios->user_id !!}</td>
			<td>{!! $usuariosServicios->user_id !!}</td>
            <td>
                <a href="{!! route('usuario.servicios.edit', [$usuariosServicios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuario.servicios.delete', [$usuariosServicios->id]) !!}" onclick="return confirm('Are you sure wants to delete this UsuariosServicios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
