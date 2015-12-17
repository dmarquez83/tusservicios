<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Proveedores</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Rif</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Rnc</th>
                    <th>Correo</th>
                    <th style="width: 10%">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedores)
                    <tr>
                        <td>{!! $proveedores->rif !!}</td>
                        <td>{!! $proveedores->nombre !!}</td>
                        <td>{!! $proveedores->telefono !!}</td>
                        <td>{!! $proveedores->direccion !!}</td>
                        <td>{!! $proveedores->rnc !!}</td>
                        <td>{!! $proveedores->correo !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.proveedores.edit', [$proveedores->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.proveedores.delete', [$proveedores->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar este Proveedor?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>

