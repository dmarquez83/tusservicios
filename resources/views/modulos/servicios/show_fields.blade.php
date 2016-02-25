<div class="col-md-10">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{!! $servicios[0]->nombre !!}</h3>
        </div>
        <form role="form">
            <div class="box-body">
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::label('Descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                        <h5>{!! $servicios[0]->descripcion !!}</h5>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Tipo de Servicio', 'Tipo de Servicio:', ['class' => 'control-label']) !!}
                        <h5>{!! $servicios[0]->nombre_tipo_servicio !!}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Html::image('assets/img/servicios-img/'.$servicios[0]->foto, '', array('class' => 'responsive-img','width' => '300', 'height' => '200')) !!}
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <a class="btn btn-warning pull-right" href="{!! route('solicitudes.create', [$servicios[0]->id]) !!}"><i class="glyphicon glyphicon-shopping-cart left"></i>Solicitar Servicio</a>
            </div>
        </form>
    </div>
</div>

<div class="form-group">
</div>
