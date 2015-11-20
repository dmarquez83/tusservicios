<div class="col m12 l10">
    <div class="container">
        <div class="row margin-top_small">
            {{--  @foreach($servicios as $servicio)   <span> {{$servicio->nombre}}   </span> @endforeach --}}
            <div class="col s12 m8">
                <h5>Servicio: {!! Form::text('Servicio',$servicios->nombre)!!} </h5>
                <p> Descripcion: {!! Form::text('descripcion',$servicios->descripcion)!!} </p>
            </div>

            <div class="col s12 m4">
                {{--  <img class="responsive-img right" src="img/electricidad.jpg" alt="100" height="200">--}}
                {!! Html::image('servicios-img/'.$servicios->foto, '', array('class' => 'responsive-img right','width' => '100', 'height' => '200')) !!}
            </div>
        </div>
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                <div class="row">
                    {!! Html::image('assets/img/map.jpg', '', array('class' => 'responsive-img')) !!}
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        {!! Form::label('direccion', 'Direccion:') !!}
                        {!! Form::textarea('direccion', null, ['class' => 'materialize-textarea']) !!}
                    </div>
                </div>
            </div>
            <div class="col s12 m6 ">
                <div class="row">
                    <div class="input-field">
                        <input type="text" name="nombre" id="nombre">
                        <label for="nombre">Persona Contacto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('telefono', 'Telefono:') !!}
                        {!! Form::text('telefono', null, ['class' => 'materialize-textarea']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input type="text" name="celular" id="celular">
                        <label for="celular">Celular</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('fecha', 'Fecha:') !!}
                        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('hora', 'Hora:') !!}
                        {!! Form::text('hora', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('horas', 'Cantidad de Horas:') !!}
                        {!! Form::text('horas', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input type="checkbox" name="insumo" id="insumo">
                        <label for="insumo">Insumo</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="input-field col s12 m12">

                    {!! Form::label('descripcion', 'Descripcion de Asistencia Tecnica:') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'materialize-textarea']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <a class="waves-effect waves-light orange darken-3 right btn" href="{!! route('solicitudes.store', [$servicios->id]) !!}"><i class="mdi-action-add-shopping-cart left"></i>Solicitar Servicio</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

</div>
