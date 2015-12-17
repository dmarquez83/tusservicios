<!-- Servicio Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('servicio_id', 'Servicio Id:') !!}
	{!! Form::select('servicio_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id', 'User Id:') !!}
	{!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
