<table class="table">
    <thead>
    <th>Descripcion</th>
			<th>Proveedor Id</th>
			<th>Proveedor Id</th>
			<th>Insumo Id</th>
			<th>Insumo Id</th>
			<th>Estatus Id</th>
			<th>Estatus Id</th>
			<th>Catalogo Id</th>
			<th>Catalogo Id</th>
			<th>Precio</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($catalogosInsumos as $catalogosInsumos)
        <tr>
            <td>{!! $catalogosInsumos->descripcion !!}</td>
			<td>{!! $catalogosInsumos->proveedor_id !!}</td>
			<td>{!! $catalogosInsumos->proveedor_id !!}</td>
			<td>{!! $catalogosInsumos->insumo_id !!}</td>
			<td>{!! $catalogosInsumos->insumo_id !!}</td>
			<td>{!! $catalogosInsumos->estatus_id !!}</td>
			<td>{!! $catalogosInsumos->estatus_id !!}</td>
			<td>{!! $catalogosInsumos->catalogo_id !!}</td>
			<td>{!! $catalogosInsumos->catalogo_id !!}</td>
			<td>{!! $catalogosInsumos->precio !!}</td>
            <td>
                <a href="{!! route('catalogosInsumos.edit', [$catalogosInsumos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('catalogosInsumos.delete', [$catalogosInsumos->id]) !!}" onclick="return confirm('Are you sure wants to delete this CatalogosInsumos?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
