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
                    {!! Form::hidden('id', $solicitudes->id, ['class' => 'form-control']) !!}
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

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Catalogo de Insumos</a></li>
        <li><a href="#tab_2" data-toggle="tab">Insumos Solicitados</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="box-body">
                <table id="tabla-listado-insumos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Insumo</th>
                        <th>Descripcion</th>
                        <th>Estatus</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Foto</th>
                        <th style="width: 10%">Seleccionar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($catalogos as $catalogo)
                        <tr>
                            <td>{!! $catalogo->nombre_insumo !!}</td>
                            <td>{!! $catalogo->descripcion !!}</td>
                            <td>{!! $catalogo->estatus !!}</td>
                            <td>{!! $catalogo->nombre !!}</td>
                            <td>{!! $catalogo->precio !!}</td>
                            <td>{!! Html::image('insumos-img/'.$catalogo->foto, '', array('class' => 'responsive-img','width' => '150', 'height' => '100')) !!}</td>
                            <td><input id = "{!! $catalogo->id_catalogo !!}" data-valor='{{$catalogo->precio}}' class="boton_check" type="checkbox" name="catalogo[]" value="{!! $catalogo->id_catalogo !!}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane" id="tab_2">
            <div class="box-body">
                <table id="tabla-listado-insumos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insumos as $insumo)
                            <tr>
                                <td>{!! $insumo->nombre !!}</td>
                                <td>{!! $insumo->descripcion !!}</td>
                                <td>{!! Html::image('insumos-img/'.$insumo->foto, '', array('class' => 'responsive-img','width' => '150', 'height' => '100')) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-warning">
    <div class="row">
        <div class="col-md-10"><h4>Total</h4></div>
        <div class="col-md-2"><h4 id="total" /></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::submit('Aceptar', ['class' => 'btn btn-warning pull-right']) !!}
    </div>
</div>