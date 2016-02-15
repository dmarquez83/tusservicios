<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Insumos</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="insumos">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Referencia</th>
                <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($insumos as $insumo)
                    <tr>
                        <td>{!! $insumo->id !!}</td>
                        <td>{!! $insumo->nombre !!}</td>
                        <td>{!! $insumo->descripcion !!}</td>
                        <td>{!! $insumo->referencia !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.insumos.edit', [$insumo->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('insumos.delete', [$insumo->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Insumo?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

