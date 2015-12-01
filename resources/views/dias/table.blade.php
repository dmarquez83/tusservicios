<table class="table">
    <thead>
    <th>Dia</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($dias as $dias)
        <tr>
            <td>{!! $dias->dia !!}</td>
            <td>
                <a href="{!! route('dias.edit', [$dias->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('dias.delete', [$dias->id]) !!}" onclick="return confirm('Are you sure wants to delete this Dias?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
