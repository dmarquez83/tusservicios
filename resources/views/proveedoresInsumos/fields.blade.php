<!-- Proveedor Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('proveedor_id', 'Proveedor Id:') !!}
	{!! Form::select('proveedor_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Insumo Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('insumo_id', 'Insumo Id:') !!}
	{!! Form::select('insumo_id', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
