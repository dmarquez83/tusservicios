
<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1 class="pull-left">Servicios</h1>
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
@foreach($servicios as $servicio)

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('../servicios-img/{{$servicio->foto}}') center center;">
                <h3 class="widget-user-username">
                    {{$servicio->nombre}}
                </h3>
            </div>
            <div class="widget-user-image">

                {!! Html::image('categorias-img/'.$servicio->foto, $servicio->nombre, array('class' => 'img-responsive')) !!}
            </div>

            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        {{$servicio->descripcion}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('detalle', [$servicio->id]) !!}" role="button">Ver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endforeach
