<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $servicios->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $servicios->descripcion !!}</p>
</div>

<!-- Id Tipo Servicio Field -->
<div class="form-group">
    {!! Form::label('id_tipo_servicio', 'Id Tipo Servicio:') !!}
    <p>{!! $servicios->id_tipo_servicio !!}</p>
</div>

<!-- Id Estatus Field -->
<div class="form-group">
    {!! Form::label('id_estatus', 'Id Estatus:') !!}
    <p>{!! $servicios->id_estatus !!}</p>
</div>

<!-- Ponderacion Field -->
<div class="form-group">
    {!! Form::label('ponderacion', 'Ponderacion:') !!}
    <p>{!! $servicios->ponderacion !!}</p>
</div>

