<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tipo de Servicios</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="tiposervicios">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($tiposervicios as $tiposervicio)
                    <tr>
                        <td>{!! $tiposervicio->id !!}</td>
                        <td>{!! $tiposervicio->nombre !!}</td>
                        <td>{!! $tiposervicio->descripcion !!}</td>
                        <td>{!! $tiposervicio->categoria !!}</td>

                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('tiposServicio', [$tiposervicio->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('tiposervicios.delete', [$tiposervicio->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Tipo de Servicio?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

