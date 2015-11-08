<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $tiposervicio->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $tiposervicio->descripcion !!}</p>
</div>

<!-- Id Categoria Field -->
<div class="form-group">
    {!! Form::label('id_categoria', 'Id Categoria:') !!}
    <p>{!! $tiposervicio->id_categoria !!}</p>
</div>

