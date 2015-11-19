<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1 class="pull-left">Categorias</h1>
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar</a>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra el Servicio que necesitas">
    </div>
</div>

<br>
<br>
@foreach($categorias as $categoria)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('categorias-img/{{$categoria->foto}}') center center;">
                <h3  class="widget-user-username">
                    {{$categoria->nombre}}
                </h3>
            </div>
            <div class="widget-user-image">
                {!! Html::image('categorias-img/'.$categoria->foto, $categoria->nombre, array('class' => 'img-responsive')) !!}
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <p>
                                {{$categoria->descripcion}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('admin.categorias.edit', [$categoria->id]) !!}" role="button">Editar</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('admin.categorias.delete', [$categoria->id]) !!}" role="button">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

