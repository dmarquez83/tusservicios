<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Solicitud {!! $solicitudes->servicios !!}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-edit"></i> {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->descripcion !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-map-marker"></i> {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->direccion !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-calendar"></i> {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->fecha !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-time"></i> {!! Form::label('hora', 'Hora:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->hora !!}</p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-user"></i> {!! Form::label('persona', 'Persona Contacto:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->horas !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-phone-alt"></i> {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}</h4>
                        <p>{!! $solicitudes->telefono !!}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h4><i class=" glyphicon glyphicon-pushpin"></i>Debe cancelar un 30% al inicio del trabajo y un 70% al terminar </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Html::image('servicios-img/'.$solicitudes->foto, '', array('class' => 'responsive-img','width' => '330', 'height' => '200')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4 class="text-center">N° de Solicitud {{$solicitudes->id}}</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h4><i class="glyphicon glyphicon-credit-card"></i> {!! Form::label('costo', 'Detalle del Pago:') !!}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('costo', 'Inicial 30%: ') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p id="inicial">inicial</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('costo', 'Pendiente 70%: ') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p id="pendiente" >Pendiente</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>{!! Form::label('costo', 'Total: ') !!}</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4><p id="costo" data-costo="{{$solicitudes->costo}}"></p></h4>
                    </div>
                </div>
            </div>
        </div>







        <div class="row">




        </div>

        <div class="row">

        </div>
        <div class="row">


        </div>
        <div class="row">

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="" role="button" data-toggle="Editar"><i class=" glyphicon glyphicon-shopping-cart"></i>Pasarela de Pago</a>
    </div>
</div>
