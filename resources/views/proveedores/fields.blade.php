<!-- Rif Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rif', 'Rif:') !!}
	{!! Form::text('rif', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Telefono:') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('direccion', 'Direccion:') !!}
	{!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Rnc Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rnc', 'Rnc:') !!}
	{!! Form::text('rnc', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('correo', 'Correo:') !!}
	{!! Form::email('correo', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
