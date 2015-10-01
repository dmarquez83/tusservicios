<!--- Nombre Field --->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Descripcion Field --->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
	{!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!--- Tabla Field --->
<div class="form-group">
    {!! Form::label('tabla', 'Tabla:') !!}

    {!! Form::select('tabla', array(
    'solicitud' => 'Solicitud',
    'servicios' => 'Servicios',
    'postulados' => 'Postulados',
    'servicios' => 'Servicios',
    'catalogos' => 'Catalogos',
    'catalogos_insumos' => 'Catalogos Insumos',
), null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
