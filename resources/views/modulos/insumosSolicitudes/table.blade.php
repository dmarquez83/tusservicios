<table class="table">
    <thead>
    <th>Insumo Id</th>
			<th>Insumo Id</th>
			<th>Solicitud Id</th>
			<th>Solicitud Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($insumosSolicitudes as $insumosSolicitudes)
        <tr>
            <td>{!! $insumosSolicitudes->insumo_id !!}</td>
			<td>{!! $insumosSolicitudes->insumo_id !!}</td>
			<td>{!! $insumosSolicitudes->solicitud_id !!}</td>
			<td>{!! $insumosSolicitudes->solicitud_id !!}</td>
            <td>
                <a href="{!! route('insumosSolicitudes.edit', [$insumosSolicitudes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('insumosSolicitudes.delete', [$insumosSolicitudes->id]) !!}" onclick="return confirm('Are you sure wants to delete this InsumosSolicitudes?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
