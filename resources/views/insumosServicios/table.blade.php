<table class="table">
    <thead>
    <th>Insumo Id</th>
			<th>Insumo Id</th>
			<th>Servicio Id</th>
			<th>Servicio Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($insumosServicios as $insumosServicios)
        <tr>
            <td>{!! $insumosServicios->insumo_id !!}</td>
			<td>{!! $insumosServicios->insumo_id !!}</td>
			<td>{!! $insumosServicios->servicio_id !!}</td>
			<td>{!! $insumosServicios->servicio_id !!}</td>
            <td>
                <a href="{!! route('insumosServicios.edit', [$insumosServicios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('insumosServicios.delete', [$insumosServicios->id]) !!}" onclick="return confirm('Are you sure wants to delete this InsumosServicios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
