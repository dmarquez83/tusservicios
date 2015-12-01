<!-- Codmun Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('codmun', 'Codmun:') !!}
	{!! Form::text('codmun', null, ['class' => 'form-control']) !!}
</div>

<!-- Nommun Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nommun', 'Nommun:') !!}
	{!! Form::text('nommun', null, ['class' => 'form-control']) !!}
</div>

<!-- Codest Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('codest', 'Codest:') !!}
	{!! Form::select('codest', [], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
