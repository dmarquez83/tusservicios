<!-- Insumo Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('insumo_id', 'Insumo Id:') !!}
	{!! Form::select('insumo_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Solicitud Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('solicitud_id', 'Solicitud Id:') !!}
	{!! Form::select('solicitud_id', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
