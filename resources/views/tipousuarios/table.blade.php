<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descripcion</th>
			<th>Abreviatura</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($tipousuarios as $tipousuarios)
        <tr>
            <td>{!! $tipousuarios->nombre !!}</td>
			<td>{!! $tipousuarios->descripcion !!}</td>
			<td>{!! $tipousuarios->abreviatura !!}</td>
            <td>
                <a href="{!! route('tipousuarios.edit', [$tipousuarios->id]) !!}"><i class="mdi-content-send"></i></a>
                <a href="{!! route('tipousuarios.delete', [$tipousuarios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tipousuarios?')"><i class="mdi-action-delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
