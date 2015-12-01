<!-- Dia Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('dia', 'Dia:') !!}
	{!! Form::text('dia', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
