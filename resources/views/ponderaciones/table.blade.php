<table class="table">
    <thead>
    <th>Valor</th>
			<th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($ponderaciones as $ponderacion)
        <tr>
            <td>{!! $ponderacion->valor !!}</td>
			<td>{!! $ponderacion->nombre !!}</td>
            <td>
                <a href="{!! route('ponderaciones.edit', [$ponderacion->id]) !!}"><i class="mdi-content-send"></i></a>
                <a href="{!! route('ponderaciones.delete', [$ponderacion->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ponderacion?')"><i class="mdi-action-delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
