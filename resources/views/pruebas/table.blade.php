<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Categoria</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($pruebas as $prueba)
        <tr>
            <td>{!! $prueba->nombre !!}</td>
			<td>{!! $prueba->categoria !!}</td>
            <td>
                <a href="{!! route('pruebas.edit', [$prueba->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('pruebas.delete', [$prueba->id]) !!}" onclick="return confirm('Are you sure wants to delete this Prueba?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
