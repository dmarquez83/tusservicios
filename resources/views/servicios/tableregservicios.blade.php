@extends('app')

@section('content')
<div>
    @include('flash::message')
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="box box-warning">
                <div class="box-header with-borde">
                    <h3 class="box-title">Registro de Servicios</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Categorias</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Servicios</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Horario</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th>Hora</th>
                                                <th>Lunes</th>
                                                <th>Martes</th>
                                                <th>Miercoles</th>
                                                <th>Jueves</th>
                                                <th>Viernes</th>
                                                <th>Sabado</th>
                                                <th>Domingo</th>
                                            </tr>
                                            <tr>
                                                <td>10:30</td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11:30</td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="input-group-addon">
                                                        <input type="checkbox">
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel box box-warning">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Ciudad
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Caracas
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Guarenas
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" disabled="">
                                                        San Antonio
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Los Teques
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        La Guaira
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" disabled="">
                                                        Los Valles
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel box box-warning">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedos">
                                            Sector
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsedos" class="panel-collapse collapse">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Caracas
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Guarenas
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" disabled="">
                                                        San Antonio
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Los Teques
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        La Guaira
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" disabled="">
                                                        Los Valles
                                                    </label>
                                                </div>
                                            </div>
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
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>
    </div>
</div>
@endsection