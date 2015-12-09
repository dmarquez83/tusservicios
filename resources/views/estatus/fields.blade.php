<   <!--- Nombre Field --->
<div class="row">
    <div class="input-field">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>




<!--- Descripcion Field --->
<div class="row">
    <div class="input-field">
    {!! Form::label('descripcion', 'Descripcion:') !!}
	{!! Form::textarea('descripcion', null, ['class' => 'materialize-textarea']) !!}
    </div>
</div>

<!--- Tabla Field --->
<div class="row">
    <div class="input-field">
    {!! Form::label('tabla', 'Tabla:') !!}

    {!! Form::select('tabla', array(
    'solicitud' => 'Solicitud',
    'servicios' => 'Servicios',
    'postulados' => 'Postulados',
    'servicios' => 'Servicios',
    'catalogos' => 'Catalogos',
    'catalogos_insumos' => 'Catalogos Insumos',
), null, []) !!}
</div>
</div>



<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
