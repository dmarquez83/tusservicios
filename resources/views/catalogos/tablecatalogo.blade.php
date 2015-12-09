@extends('app')

@section('content')
    <div>
       {{--  "id" => 1
        "descripcion" => "sdvsdv"
        "fecha" => "2015-12-18"
        "hora" => "8:30"
        "direccion" => "ferfew"
        "telefono" => "0426-9728121"
        "horas" => "fwef"
        "costo" => "0"
        "id_usuario" => 4
        "id_estatus" => 3
        "id_servicio" => 5
        "created_at" => "2015-12-04 21:03:19"
        "updated_at" => "2015-12-04 21:03:19"
        "id_evaluaciones" => null--}}
        @include('flash::message')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Solicitud</h3>
                    </div>
                    <form role="form-horizontal">
                        <div class="box-body">

                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('servicio', 'Servicio:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->nombre !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Direccion', 'Direccion:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->direccion !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Telefono', 'Telefono:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->telefono !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Fecha', 'Fecha:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->fecha !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('descripcion', 'Descripcion del Servicio:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->descripcion_servicio !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Contacto', 'Persona Contacto:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->contacto !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Celular', 'Celular:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->telefono !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Hora', 'Hora:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            {!! $solicitudes[0]->hora !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('Descripcion de la Solicitud', 'Descripcion de la Solicitud:', ['class' => 'control-label col-sm-4']) !!}
                                    <div class="col-sm-8">
                                        {!! $solicitudes[0]->descripcion !!}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insumos</h3>
                    </div>
                    <div class="box-body">
                        @foreach($insumos as $insumo)
                            <div class="box-group" id="accordion">
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                {!! $insumo->descripcion !!}
                                            </a>
                                            {{-- no va a estar relacionada a nada el href por que  lo vamos a implementar con ajax --}}
                                            <a
                                                    href="#"
                                                    class="btn btn-primary btn-listado-proveedores"
                                                    data-id="{{ $insumo->id }}"
                                                    data-name="{{ $insumo->descripcion }}"
                                                    data-path="{{ route('catalogoproveedores.detalle') }}"
                                                    data-toggle="modal"
                                                    data-target="#myModal"
                                                    data-token="{{ csrf_token() }}"
                                                    >
                                                <i class="fa fa-external-link">Solicitar Insumos</i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="box-body">
                                            <div class="">
                                                <div class="box-body no-padding">
                                                    <table class="table table-condensed">
                                                        <tr>
                                                            <th>Proveedor</th>
                                                            <th>Precio</th>
                                                            <th>Foto</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Prueba</td>
                                                            <td>Prueba</td>
                                                            <td>Prueba</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Prueba</td>
                                                            <td>Prueba</td>
                                                            <td>Prueba</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('catalogosInsumos.modal-proveedores')
                <div class="box-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-warning pull-right']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-modulo')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/proveedores.js') !!}
@endsection