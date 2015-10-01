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

<!--- Id Tipo Servicio Field --->
<div class="form-group">
    {!! Form::label('id_tipo_servicio', 'Tipo Servicio:') !!}
	{!! Form::select('id_tipo_servicio', $tiposervicios, null, ['class' => 'form-control']) !!}
</div>

<!--- Id Estatus Field --->
<div class="form-group">
    {!! Form::label('id_estatus', 'Id Estatus:') !!}
	{!! Form::select('id_estatus', $estatu, null, ['class' => 'form-control']) !!}
</div>

<!--- Ponderacion Field --->
<div class="form-group">
    {!! Form::label('ponderacion', 'Ponderacion:') !!}

    {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
