<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="#">Agregar</a>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 class="box-title">Servicios</h2>
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
                    <th>Servicios</th>
                    <th style="width: 700px">Descripcion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($servicios as $servicios)
                    <tr>
                    <th >{{$servicios->nombre}}</th>
                    <th>{{$servicios->descripcion}}</th>
                    <th>
                        <div class="col-sm-6 border-right">
                            <a class="description-header" href="{!! route('categorias.servicios.edit', [$servicios->id]) !!}">Editar</a>
                        </div>
                        <div class="col-sm-6 border-right">
                            <a class="description-header" href="{!! route('categorias.servicios.delete', [$servicios->id]) !!}">Eliminar</a>
                        </div>
                    </th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
