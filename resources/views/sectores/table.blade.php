<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Ciudad Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($sectores as $sector)
        <tr>
            <td>{!! $sector->nombre !!}</td>
			<td>{!! $sector->ciudad_id !!}</td>
            <td>
                <a href="{!! route('admin.sectores.edit', [$sector->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.sectores.delete', [$sector->id]) !!}" onclick="return confirm('Are you sure wants to delete this Sector?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
