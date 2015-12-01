<table class="table">
    <thead>
    <th>Codest</th>
			<th>Nomest</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($estados as $estados)
        <tr>
            <td>{!! $estados->codest !!}</td>
			<td>{!! $estados->nomest !!}</td>
            <td>
                <a href="{!! route('estados.edit', [$estados->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('estados.delete', [$estados->id]) !!}" onclick="return confirm('Are you sure wants to delete this Estados?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
