<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
	{!! Form::select('descripcion', [], null, ['class' => 'form-control']) !!}
</div>

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

<!-- Estatus Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estatus_id', 'Estatus Id:') !!}
	{!! Form::select('estatus_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Catalogo Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('catalogo_id', 'Catalogo Id:') !!}
	{!! Form::select('catalogo_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('precio', 'Precio:') !!}
	{!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
