<table class="table">
    <thead>
    <th>Rif</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Direccion</th>
			<th>Rnc</th>
			<th>Correo</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($proveedores as $proveedores)
        <tr>
            <td>{!! $proveedores->rif !!}</td>
			<td>{!! $proveedores->nombre !!}</td>
			<td>{!! $proveedores->telefono !!}</td>
			<td>{!! $proveedores->direccion !!}</td>
			<td>{!! $proveedores->rnc !!}</td>
			<td>{!! $proveedores->correo !!}</td>
            <td>
                <a href="{!! route('admin.proveedores.edit', [$proveedores->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.proveedores.delete', [$proveedores->id]) !!}" onclick="return confirm('Are you sure wants to delete this Proveedores?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
