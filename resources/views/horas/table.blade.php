<table class="table">
    <thead>
    <th>Hora</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($horas as $horas)
        <tr>
            <td>{!! $horas->hora !!}</td>
            <td>
                <a href="{!! route('horas.edit', [$horas->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('horas.delete', [$horas->id]) !!}" onclick="return confirm('Are you sure wants to delete this Horas?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
