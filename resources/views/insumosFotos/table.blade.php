<table class="table">
    <thead>
    <th>Insumo Id</th>
			<th>Insumo Id</th>
			<th>Foto</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($insumosFotos as $insumosFoto)
        <tr>
            <td>{!! $insumosFoto->insumo_id !!}</td>
			<td>{!! $insumosFoto->insumo_id !!}</td>
			<td>{!! $insumosFoto->foto !!}</td>
            <td>
                <a href="{!! route('insumosFotos.edit', [$insumosFoto->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('insumosFotos.delete', [$insumosFoto->id]) !!}" onclick="return confirm('Are you sure wants to delete this InsumosFoto?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
