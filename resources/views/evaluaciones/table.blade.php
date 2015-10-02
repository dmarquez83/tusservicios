<table class="table">
    <thead>
    <th>Valor</th>
			<th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($evaluaciones as $evaluaciones)
        <tr>
            <td>{!! $evaluaciones->valor !!}</td>
			<td>{!! $evaluaciones->nombre !!}</td>
            <td>
                <a href="{!! route('evaluaciones.edit', [$evaluaciones->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('evaluaciones.delete', [$evaluaciones->id]) !!}" onclick="return confirm('Are you sure wants to delete this Evaluaciones?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
