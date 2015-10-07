<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descripcion</th>
    <th width="50px">Acción</th>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->nombre !!}</td>
			<td>{!! $categoria->decripcion !!}</td>
            <td>
                <a href="{!! route('categorias.edit', [$categoria->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('categorias.delete', [$categoria->id]) !!}" onclick="return confirm('¿Estás seguro quiere eliminar esta Categoria?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
