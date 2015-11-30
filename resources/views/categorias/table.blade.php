<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar Categorias</a>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Categorias</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Categorias</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                            <td>
                                <div class="col-sm-6 border-right">
                                    <a class="btn btn-primary" href="{!! route('admin.categorias.edit', [$categoria->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <a class="btn btn-primary" href="{!! route('admin.categorias.delete', [$categoria->id]) !!}" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
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