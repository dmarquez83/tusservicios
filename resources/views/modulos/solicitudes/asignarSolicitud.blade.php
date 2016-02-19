@if(!$solicitudes->id_estatus_user_solicitud or $solicitudes->id_estatus_user_solicitud==13)
<div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Solicitud de {!! $solicitudes->servicios !!}</h3>
        </div>
        <form role="form">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->descripcion !!}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- Fecha Field -->
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->fecha !!}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- Hora Field -->
                        <div class="form-group">
                            {!! Form::label('hora', 'Hora:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->hora !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Direccion Field -->
                        <div class="form-group">
                            {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->direccion !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Telefono Field -->
                        <div class="form-group">
                            {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->telefono !!}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- Horas Field -->
                        <div class="form-group">
                            {!! Form::label('horas', 'Horas:', ['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->horas !!}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- Costo Field -->
                        <div class="form-group">
                            {!! Form::label('costo', 'Costo:',['class' => 'control-label']) !!}
                            <p>{!! $solicitudes->costo !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Usuarios que prestan el servicio:  {!! $solicitudes->servicios !!}</h3>
                    </div>
                    <table id="lissolicitud" class="table table-bordered table-striped">
                        <thead>
                            <th>Seleccionar</th>
                            <th>Usuario </th>
                            <th>Nombre de Usuario </th>
                            <th>Lugares </th>
                            <th>Horario </th>
                        </thead>
                        <tbody>
                        @foreach($usuariosServicios as $usuariosservicio)
                            <tr>
                                <td>{!! Form::radio('usuario', $usuariosservicio->user_id, false) !!}</td>
                                <td>{!! $usuariosservicio->user_id !!}</td>
                                <td>{!! $usuariosservicio->name !!}</td>
                                <td><div id="lugares" >   {!! Form::hidden('ruta', route('lugares.getLugares',$usuariosservicio->id ), ['class' => 'form-control', 'id' => 'ruta']) !!}</div></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <div class="box-footer">
            {!! Form::submit('Asignar', ['class' => 'btn btn-warning pull-right']) !!}
        </div>
    </div>
@endif

