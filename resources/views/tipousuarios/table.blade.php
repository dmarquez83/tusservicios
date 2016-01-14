<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Tipo de Usuarios
            </h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="tipousuario">
                <thead>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Abreviatura</th>
                    <th width="150px">Acciones</th>
                </thead>
                <tbody>
                @foreach($tipousuarios as $tipousuarios)
                    <tr>
                        <td>{!! $tipousuarios->nombre !!}</td>
                        <td>{!! $tipousuarios->descripcion !!}</td>
                        <td>{!! $tipousuarios->abreviatura !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('tipousuarios.edit', [$tipousuarios->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('tipousuarios.delete', [$tipousuarios->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Tipo de Usuario?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
