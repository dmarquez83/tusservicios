<!-- Codest Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('codest', 'Codest:') !!}
	{!! Form::text('codest', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomest Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nomest', 'Nomest:') !!}
	{!! Form::text('nomest', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
