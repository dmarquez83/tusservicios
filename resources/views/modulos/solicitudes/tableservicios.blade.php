<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1 class="pull-left">Servicios</h1>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    {!! Form::open(array('route' => ['buscar-servicios', $servicios[0]->id_categoria], 'method' => 'GET', 'class' => '', 'role' => 'search')) !!}
    <div class="input-group margin">
        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar Servicios']) !!}
        <span class="input-group-btn">
        {!! Form::submit('Buscar', ['class' => "btn btn-primary btn-flat"]) !!}
    </span>
    </div>
    {!! Form::close() !!}
</div>
<br>
<br>
@foreach($servicios as $servicio)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('/servicios-img/{{$servicio->foto}}') center center;">
                <h3  class="widget-user-username">
                    {{$servicio->nombre}}
                </h3>
            </div>
            <div class="widget-user-image">
                {!! Html::image('categorias-img/thumb_tusservicios-logo.jpg', '', array('class' => 'img-circle')) !!}
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <p>{{$servicio->descripcion}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('detalle', [$servicio->id]) !!}">Detalle</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('solicitudes.create', [$servicio->id]) !!}"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



