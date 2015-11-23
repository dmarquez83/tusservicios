<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar</a>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Categorias</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input class="form-control pull-right" type="text" placeholder="Buscar" name="table_search">
                <div class="input-group-btn">
                </div>
            </div>
        </div>
    </div>

    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Categorias</th>
                    <th style="width: 700px">Descripcion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($categorias as $categoria)
                <tr>
                    <th >{{$categoria->nombre}}</th>
                    <th>{{$categoria->descripcion}}</th>
                    <th>
                        <div class="col-sm-6 border-right">
                            <a class="description-header" href="{!! route('admin.categorias.edit', [$categoria->id]) !!}" role="button"><i class="glyphicon glyphicon-pencil"></i>Editar</a>
                        </div>
                        <div class="col-sm-6 border-right">
                            <a class="description-header" href="{!! route('admin.categorias.delete', [$categoria->id]) !!}" role="button"><i class="glyphicon glyphicon-remove"></i>Eliminar</a>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

