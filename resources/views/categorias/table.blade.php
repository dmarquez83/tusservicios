<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Decripcion</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->nombre !!}</td>
			<td>{!! $categoria->decripcion !!}</td>
            <td>
                <a href="{!! route('categorias.edit', [$categoria->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('categorias.delete', [$categoria->id]) !!}" onclick="return confirm('Are you sure wants to delete this Categoria?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
