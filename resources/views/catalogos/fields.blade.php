<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
	{!! Form::select('descripcion', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Solicitud Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('solicitud_id', 'Solicitud Id:') !!}
	{!! Form::select('solicitud_id', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estatus_id', 'Estatus Id:') !!}
	{!! Form::select('estatus_id', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
