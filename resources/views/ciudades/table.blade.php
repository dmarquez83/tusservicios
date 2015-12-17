<table class="table">
    <thead>
    <th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($ciudades as $ciudad)
        <tr>
            <td>{!! $ciudad->nombre !!}</td>
            <td>
                <a href="{!! route('admin.ciudades.edit', [$ciudad->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.ciudades.delete', [$ciudad->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ciudad?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
