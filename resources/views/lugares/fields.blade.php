<!-- Usuario Servicio Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario_servicio_id', 'Usuario Servicio Id:') !!}
	{!! Form::number('usuario_servicio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
	{!! Form::select('municipio_id', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
