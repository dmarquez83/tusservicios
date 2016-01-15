<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Solicitudes</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="lissolicitud">
                <thead>
                <th>Servicios</th>
                <th>Estatus</th>
                <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr>
                        <td>{!! $solicitud->servicios !!}</td>
                        <td>{!! $solicitud->estatus !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('catalogos.createnew', [$solicitud->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-search"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

