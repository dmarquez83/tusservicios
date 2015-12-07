<div class="col-md-10">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">{{$servicios->nombre}}</h3>
        </div>
        <form role="form">
            <div class="box-body">
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::label('servicio', 'Servicio:', ['class' => 'control-label']) !!}
                        <h5>{{$servicios->nombre}}</h5>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                        <h5>{{$servicios->descripcion}}</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Html::image('servicios-img/'.$servicios->foto, '', array('class' => 'responsive-img','width' => '300', 'height' => '200')) !!}


                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                     {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31383.5441410657!2d-66.94185019999999!3d10.50515445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sve!4v1448581560441" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('direccion', null,['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('contacto', 'Persona Contacto', ['class' => 'control-label']) !!}
                        {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefono', 'Telefono:',['class' => 'control-label']) !!}
                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('celular', 'Celular:',['class' => 'control-label']) !!}
                        {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('fecha', 'Fecha:',['class' => 'control-label']) !!}
                        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                        {!! Form::label('hora', 'Hora:',['class' => 'control-label']) !!}
                        {!! Form::text('hora', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                <div class="form-group">
                    {{-- no va a estar relacionada a nada el href por que  lo vamos a implementar con ajax --}}
                    <a
                            href="#"
                            class="btn btn-primary btn-listado-insumos"
                            data-id="{{ $servicios->id }}"
                            data-name="{{ $servicios->nombre }}"
                            data-img="{{ asset('insumos-img/') }}"
                            data-path="{{ route('insumosSolicitudes.detalle') }}"
                            data-toggle="modal"
                            data-target="#myModal"
                            data-token="{{ csrf_token() }}"
                            >
                        <i class="fa fa-external-link">Solicitar Insumos</i>
                    </a>
                </div>
                </div>




                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('descripcion', 'Descripcion de Asistencia Tecnica:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('descripcion', null,['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                </div>
            </div>

            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#listaInsumos" aria-expanded="false" aria-controls="collapseExample">
               Ver Insumos
            </a>

            <div class="collapse" id="listaInsumos">
                <div class="well">
                    <table class="table table-stripped table-bordered table-hover" id="tabla-listado-insumos">
                        <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Referencia</th>
                            <th>descripcion</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box-footer">
                {{--  <a class="btn btn-warning pull-right" href="{!! route('solicitudes.store', [$servicios->id]) !!}"><i class="glyphicon glyphicon-shopping-cart left"></i>Solicitar Servicio</a>--}}
                {!! Form::submit('Solicitar Servicio', ['class' => 'btn btn-warning pull-right']) !!}
            </div>
        </form>
    </div>
    @include('insumosSolicitudes.modal-insumos')
</div>
<div class="col-sm-2">
</div>
