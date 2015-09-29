<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descripcion</th>
			<th>Id Categoria</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($tiposervicios as $tiposervicio)
        <tr>
            <td>{!! $tiposervicio->nombre !!}</td>
			<td>{!! $tiposervicio->descripcion !!}</td>
			<td>{!! $tiposervicio->id_categoria !!}</td>
            <td>
                <a href="{!! route('tiposervicios.edit', [$tiposervicio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('tiposervicios.delete', [$tiposervicio->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tiposervicio?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
