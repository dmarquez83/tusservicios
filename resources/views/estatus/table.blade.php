<table class="table">
    <thead>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Tabla</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($estatus as $estatu)
        <tr>
            <td>{!! $estatu->nombre !!}</td>
            <td>{!! $estatu->descripcion !!}</td>
            <td>{!! $estatu->tabla !!}</td>
            <td>
                <a href="{!! route('estatus.edit', [$estatu->id]) !!}"><i class="mdi-content-send"></i></a>
                <a href="{!! route('estatus.delete', [$estatu->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ponderacion?')"><i class="mdi-action-delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


