@extends('app')

@section('content')
    <div>

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
                                            Servicio
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Direccion', 'Direccion:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Direccion
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Telefono', 'Telefono:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Telefono
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Fecha', 'Fecha:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Fecha
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Descripcion
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Contacto', 'Persona Contacto:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Persona Contacto
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Celular', 'Celular:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Celular
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        {!! Form::label('Hora', 'Hora:', ['class' => 'control-label col-sm-4']) !!}
                                        <div class="col-sm-8">
                                            Hora
                                        </div>
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
                        <div class="box-group" id="accordion">
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Insumos 1
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
                            <div class="panel box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Insumo 2
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
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
                            <div class="panel box box-success">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            Insumo3
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
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
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-warning pull-right']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection