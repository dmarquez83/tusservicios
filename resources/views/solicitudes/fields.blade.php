<!--- Descripcion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Describe el detalle del Trabajo:') !!}
	{!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!--- Fecha Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha', 'Fecha:') !!}
	{!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!--- Hora Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('hora', 'Hora:') !!}
	{!! Form::text('hora', null, ['class' => 'form-control']) !!}
</div>

<!--- Direccion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('direccion', 'Direccion:') !!}
	{!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
</div>

<!--- Telefono Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Telefono:') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!--- Horas Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('horas', 'Cantidad de Horas:') !!}
	{!! Form::text('horas', null, ['class' => 'form-control']) !!}
</div>


<!--- Id Servicio Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_servicio', 'Servicio:') !!}
	{!! Form::select('id_servicio', $servicios, null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
