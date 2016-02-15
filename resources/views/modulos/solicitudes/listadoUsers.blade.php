<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Solicitudes</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="lissolicitud">
                <thead>
                <th>N°</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripcion</th>
                <th>Direccion</th>

                <th>Telefono</th>
                <th>Horas</th>
                <th>Costo</th>
                <th>Estatus</th>

                <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr>
                        <td>{!! $solicitud->id !!}</td>
                        <td>{!! $solicitud->servicios !!}</td>
                        <td>{!! $solicitud->fecha !!}</td>
                        <td>{!! $solicitud->hora !!}</td>
                        <td>{!! $solicitud->descripcion !!}</td>
                        <td>{!! $solicitud->direccion !!}</td>

                        <td>{!! $solicitud->telefono !!}</td>
                        <td>{!! $solicitud->horas !!}</td>
                        <td>{!! $solicitud->costo !!}</td>


                        <td>{!! $solicitud->estatus !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('solicitudes.getDetSolicitud', [$solicitud->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-search"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
