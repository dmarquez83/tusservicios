
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::input('text', 'nombre', '', ['class'=> 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('descripción', 'Descripción:') !!}
    {!! Form::input('text', 'descripcion', '', ['class'=> 'form-control']) !!}
</div>



<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

