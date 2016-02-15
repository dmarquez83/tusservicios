<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Estatus</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="estatus">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Tabla</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($estatus as $estatus)
                    <tr>
                        <td>{!! $estatus->id !!}</td>
                        <td>{!! $estatus->nombre !!}</td>
                        <td>{!! $estatus->descripcion !!}</td>
                        <td>{!! $estatus->tabla !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.estatus.edit', [$estatus->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('estatus.delete', [$estatus->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Estatus?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


