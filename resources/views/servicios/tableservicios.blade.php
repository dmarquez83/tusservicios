<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('categorias.servicios.create') !!}">Agregar Servicio</a>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Servicios</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Servicios</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($servicios as $servicios)
                    <tr>
                        <td>{{$servicios->id}}</td>
                        <td>{{$servicios->nombre}}</td>
                        <td>{{$servicios->descripcion}}</td>
                        <td>{{$servicios->nombre_categoria}}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('categorias.servicios.edit', [$servicios->id]) !!}"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('categorias.servicios.delete', [$servicios->id]) !!}"><i class="glyphicon glyphicon-remove"></i></a>
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
