<table class="table">
    <thead>
    <th>Proveedor Id</th>
			<th>Proveedor Id</th>
			<th>Insumo Id</th>
			<th>Insumo Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($proveedoresInsumos as $proveedoresInsumos)
        <tr>
            <td>{!! $proveedoresInsumos->proveedor_id !!}</td>
			<td>{!! $proveedoresInsumos->proveedor_id !!}</td>
			<td>{!! $proveedoresInsumos->insumo_id !!}</td>
			<td>{!! $proveedoresInsumos->insumo_id !!}</td>
            <td>
                <a href="{!! route('proveedoresInsumos.edit', [$proveedoresInsumos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('proveedoresInsumos.delete', [$proveedoresInsumos->id]) !!}" onclick="return confirm('Are you sure wants to delete this ProveedoresInsumos?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
