<div class="container">
    <div class="col s12">
        <table class="table">
            <thead>
            <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Id Tipo Servicio</th>
                    <th>Id Estatus</th>
                    <th>Ponderacion</th>
            <th width="50px">Action</th>
            </thead>
            <tbody>
            @foreach($servicios as $servicios)
                <tr>
                    <td>{!! $servicios->nombre !!}</td>
                    <td>{!! $servicios->descripcion !!}</td>
                    <td>{!! $servicios->nombre_tipo_servicio !!}</td>
                    <td>{!! $servicios->nombre_estatus !!}</td>
                    <td>{!! $servicios->nombre_ponderacion !!}</td>
                    <td>
                        <a href="{!! route('servicios.edit', [$servicios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('servicios.delete', [$servicios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Servicios?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
