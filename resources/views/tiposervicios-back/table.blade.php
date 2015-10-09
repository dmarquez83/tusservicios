<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descripcion</th>
			<th>Categoria</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($tiposervicios as $tiposervicio)
        <tr>
            <td>{!! $tiposervicio->nombre !!}</td>
			<td>{!! $tiposervicio->descripcion !!}</td>
			<td>{!! $tiposervicio->categoria !!}</td>
            <td>
                <a href="{!! route('tiposervicios.edit', [$tiposervicio->id]) !!}"><i class="mdi-content-send"></i></a>
                <a href="{!! route('tiposervicios.delete', [$tiposervicio->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tiposervicio?')"><i class="mdi-action-delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
