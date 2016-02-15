<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Tus Servicios
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="usuarioSolicitud">
                    <thead>
                    <th>N° Solicitud</th>
                    <th>Servicio</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Direccion</th>
                    <th>Estatus</th>
                    <th width="50px">Acciones</th>
                    </thead>
                    <tbody>
                    @foreach($usuariosSolicitudes as $usuariosSolicitud)
                        <tr>
                            <td>{!! $usuariosSolicitud->solicitud_id !!}</td>
                            <td>{!! $usuariosSolicitud->nombre !!}</td>
                            <td>{!! $usuariosSolicitud->descripcion !!}</td>
                            <td>{!! $usuariosSolicitud->fecha !!}</td>
                            <td>{!! $usuariosSolicitud->direccion !!}</td>
                            <td>{!! $usuariosSolicitud->nombre_estatus !!}</td>

                            <td>
                                <div class="col-sm-6 border-right">
                                    <a class="btn btn-primary" href="{!! route('solicitudes.getDetServicios', [$usuariosSolicitud->id_solicitud]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>