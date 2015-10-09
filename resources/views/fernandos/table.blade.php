<table class="table">
    <thead>
    <th>Nombre</th>
			<th>Descr</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($fernandos as $fernando)
        <tr>
            <td>{!! $fernando->nombre !!}</td>
			<td>{!! $fernando->descr !!}</td>
            <td>
                <a href="{!! route('fernandos.edit', [$fernando->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('fernandos.delete', [$fernando->id]) !!}" onclick="return confirm('Are you sure wants to delete this fernando?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
