<!-- Insumo Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('insumo_id', 'Insumo Id:') !!}
	{!! Form::select('insumo_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto', 'Foto:') !!}
	{!! Form::select('foto', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
