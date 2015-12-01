<!-- Usuario Servicio Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario_servicio_id', 'Usuario Servicio Id:') !!}
	{!! Form::number('usuario_servicio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('hora_id', 'Hora Id:') !!}
	{!! Form::select('hora_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('dia_id', 'Dia Id:') !!}
	{!! Form::select('dia_id', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
