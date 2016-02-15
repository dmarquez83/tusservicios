<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Solicitud {!! $solicitudes->servicios !!}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->descripcion !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->fecha !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('hora', 'Hora:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->hora !!}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->direccion !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->telefono !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('persona', 'Persona Contacto:', ['class' => 'control-label']) !!}
                    <p>{!! $solicitudes->horas !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('costo', 'Costo:') !!}
                    <p id="costo" data-costo="{{$solicitudes->costo}}">{{$solicitudes->costo}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Insumos
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped" id="usuarioSolicitud">
            <thead>
                <th width="150px">Nombre</th>
                <th>Descripcion</th>
                <th>Referencia</th>
                <th>Foto</th>
            </thead>
            <tbody>
            @foreach($insumos as $insumo)
                <tr>
                    <td>{!! $insumo->nombre !!}</td>
                    <td>{!! $insumo->descripcion !!}</td>
                    <td>{!! $insumo->referencia !!}</td>
                    <td>{!! Html::image('insumos-img/'.$insumo->foto, '', array('class' => 'responsive-img','width' => '150', 'height' => '100')) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
        <a class="btn btn-success center-block" href="{!! route('solicitudes.getAceptarServicios', [$solicitudes->id]) !!}" role="button" data-toggle="Editar">Aceptar</a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-danger center-block" href="{!! route('solicitudes.getRechazarServicios', [$solicitudes->id]) !!}" role="button" data-toggle="Editar">Rechazar</a>
    </div>
    <div class="col-md-3">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary center-block" href="{!! route('solicitudes.getAceptarServicios', [$solicitudes->id]) !!}" role="button" data-toggle="Editar">Pagos</a>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary center-block" href="{!! route('solicitudes.getRechazarServicios', [$solicitudes->id]) !!}" role="button" data-toggle="Editar">Factura</a>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary center-block" href="{!! route('solicitudes.getRechazarServicios', [$solicitudes->id]) !!}" role="button" data-toggle="Editar">Evaluacion</a>
    </div>
</div>