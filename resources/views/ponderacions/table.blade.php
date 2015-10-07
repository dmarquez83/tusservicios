<table class="table">
    <thead>
    <th>Valor</th>
			<th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($ponderacions as $ponderacion)
        <tr>
            <td>{!! $ponderacion->valor !!}</td>
			<td>{!! $ponderacion->nombre !!}</td>
            <td>
                <a href="{!! route('ponderacions.edit', [$ponderacion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('ponderacions.delete', [$ponderacion->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ponderacion?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
