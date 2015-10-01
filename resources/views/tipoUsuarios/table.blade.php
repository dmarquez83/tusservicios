<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descripcion</th>
			<th>Abreviatura</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($tipoUsuarios as $tipoUsuarios)
        <tr>
            <td>{!! $tipoUsuarios->nombre !!}</td>
			<td>{!! $tipoUsuarios->descripcion !!}</td>
			<td>{!! $tipoUsuarios->abreviatura !!}</td>
            <td>
                <a href="{!! route('tipoUsuarios.edit', [$tipoUsuarios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('tipoUsuarios.delete', [$tipoUsuarios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tipo_usuarios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
