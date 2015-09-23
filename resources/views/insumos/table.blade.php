<table class="table">
    <thead>
    <th>Descripcion</th>
			<th>Referencia</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($insumos as $insumo)
        <tr>
            <td>{!! $insumo->descripcion !!}</td>
			<td>{!! $insumo->referencia !!}</td>
            <td>
                <a href="{!! route('insumos.edit', [$insumo->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('insumos.delete', [$insumo->id]) !!}" onclick="return confirm('Are you sure wants to delete this Insumo?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
