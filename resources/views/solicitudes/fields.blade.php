<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h5 class="box-title">{{$servicios->nombre}}</h5>
        </div>

        <div class="box-body">
            <div class="col-sm-6 form-group">
                <div class="row">
                    <div class="col-sm-2 form-group">
                        {!! Form::label('servicio', 'Servicio:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::label('Servicio',$servicios->nombre)!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2 form-group">
                        {!! Form::label('Descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::label('descripcion',$servicios->descripcion)!!}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 form-group">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        {!! Html::image('servicios-img/'.$servicios->foto, '', array('class' => 'responsive-img right','width' => '300', 'height' => '200')) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-5 form-group">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Html::image('assets/img/map.jpg', '', array('class' => 'responsive-img')) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-7 form-group">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}

                    </div>
                    <div class="col-sm-8">
                        {!! Form::textarea('direccion', null,['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('contacto', 'Persona Contacto', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('telefono', 'Telefono:',['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('celular', 'Celular:',['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('fecha', 'Fecha:',['class' => 'control-label']) !!}

                    </div>
                    <div class="col-sm-8">
                        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('hora', 'Hora:',['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::text('hora', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('insumo', 'Insumo:',['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::checkbox('insumo', 'insumo', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12 form-group">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        {!! Form::label('descripcion', 'Descripcion de Asistencia Tecnica:', ['class' => 'control-label']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::textarea('descripcion', null,['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                </div>

            </div>


            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-warning" href="{!! route('solicitudes.store', [$servicios->id]) !!}"><i class="glyphicon glyphicon-shopping-cart left"></i>Solicitar Servicio</a>
            {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
        </div>
</div>
