<table class="table">
    <thead>
    <th>Usuario Servicio Id</th>
			<th>Usuario Servicio Id</th>
			<th>Municipio Id</th>
			<th>Municipio Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($lugares as $lugares)
        <tr>
            <td>{!! $lugares->usuario_servicio_id !!}</td>
			<td>{!! $lugares->usuario_servicio_id !!}</td>
			<td>{!! $lugares->municipio_id !!}</td>
			<td>{!! $lugares->municipio_id !!}</td>
            <td>
                <a href="{!! route('lugares.edit', [$lugares->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('lugares.delete', [$lugares->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lugares?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
