<table class="table">
    <thead>
    <th>Usuario Servicio Id</th>
			<th>Usuario Servicio Id</th>
			<th>Hora Id</th>
			<th>Hora Id</th>
			<th>Dia Id</th>
			<th>Dia Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($horarios as $horarios)
        <tr>
            <td>{!! $horarios->usuario_servicio_id !!}</td>
			<td>{!! $horarios->usuario_servicio_id !!}</td>
			<td>{!! $horarios->hora_id !!}</td>
			<td>{!! $horarios->hora_id !!}</td>
			<td>{!! $horarios->dia_id !!}</td>
			<td>{!! $horarios->dia_id !!}</td>
            <td>
                <a href="{!! route('horarios.edit', [$horarios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('horarios.delete', [$horarios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Horarios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
