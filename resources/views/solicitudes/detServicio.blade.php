<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Solicitud {!! $solicitudes->servicios !!}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->descripcion !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->fecha !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('hora', 'Hora:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->hora !!}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->direccion !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->telefono !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('horas', 'Horas:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->horas !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('costo', 'Costo:') !!}
                    <p id="costo" data-costo="{{$solicitudes->costo}}">{{$solicitudes->costo}}</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="" role="button" data-toggle="Editar"><i class=" glyphicon glyphicon-shopping-cart"></i>Aceptar</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="" role="button" data-toggle="Editar"><i class=" glyphicon glyphicon-shopping-cart"></i>Rechazar</a>
    </div>
</div>