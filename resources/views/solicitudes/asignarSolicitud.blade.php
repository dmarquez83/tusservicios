<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $solicitudes->descripcion !!}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $solicitudes->fecha !!}</p>
</div>

<!-- Hora Field -->
<div class="form-group">
    {!! Form::label('hora', 'Hora:') !!}
    <p>{!! $solicitudes->hora !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $solicitudes->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $solicitudes->telefono !!}</p>
</div>

<!-- Horas Field -->
<div class="form-group">
    {!! Form::label('horas', 'Horas:') !!}
    <p>{!! $solicitudes->horas !!}</p>
</div>

<!-- Costo Field -->
<div class="form-group">
    {!! Form::label('costo', 'Costo:') !!}
    <p>{!! $solicitudes->costo !!}</p>
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">listado de usuarios que prestan el servicio:  {!! $solicitudes->servicios !!}</h3>
        </div>

            <table id="lissolicitud" class="table table-bordered table-striped">
                <thead>
                <th>Seleccionar</th>
                <th> id usuario </th>
                <th> nombre de usuario </th>
                <th> ver Lugares </th>
                <th> ver Horario </th>

                </thead>
                <tbody>
                @foreach($usuariosServicios as $usuariosservicio)
                    <tr>
                        <td>{!! Form::radio('usuario', $usuariosservicio->user_id, false) !!}</td>
                        <td>{!! $usuariosservicio->user_id !!}</td>
                        <td>{!! $usuariosservicio->name !!}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

</div>

<div class="box-footer">
    {!! Form::submit('Asignar', ['class' => 'btn btn-warning pull-right']) !!}
</div>