<table class="table">
    <thead>
    <th>Descripcion</th>
			<th>Solicitud Id</th>
			<th>Solicitud Id</th>
			<th>Estatus Id</th>
			<th>Estatus Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($catalogos as $catalogos)
        <tr>
            <td>{!! $catalogos->descripcion !!}</td>
			<td>{!! $catalogos->solicitud_id !!}</td>
			<td>{!! $catalogos->solicitud_id !!}</td>
			<td>{!! $catalogos->estatus_id !!}</td>
			<td>{!! $catalogos->estatus_id !!}</td>
            <td>
                <a href="{!! route('catalogos.edit', [$catalogos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('catalogos.delete', [$catalogos->id]) !!}" onclick="return confirm('Are you sure wants to delete this Catalogos?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
