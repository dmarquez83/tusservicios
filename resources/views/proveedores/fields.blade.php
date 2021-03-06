<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('rif', 'Rif:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('rif', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('nombrepro', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::textarea('direccion', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('rnc', 'Rnc:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('correo', 'Correo:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('rnc', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <h2 class="page-header">Insumos</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom ">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Listado</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Nuevo</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        <div class="">
                            <div class="box-header">
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Accion</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($insumos as $insumo)
                                        <tr id={{ 'fil'.$insumo->id}} >
                                            <td style="width: 10%; align-content: center">
                                                <div id="checkbox">
                                                    <label>
                                                        {!! Form::checkbox('insumo', $insumo->id, false,['class' => 'insumo']) !!}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{$insumo->nombre}}</td>
                                            <td>{{$insumo->descripcion}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('referencia', 'Referencia:', ['class' => 'control-label']) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                {!! form::label('image','Imagen', ['class' => 'control-label'])!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::textarea('referencia', null, ['class' => 'form-control','rows' =>'3']) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                {!! form::file('foto',null,['class' => 'form-control']) !!}
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary procesarForm btn-opc pull-right']) !!}
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Insumos Agregados
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="">
                        <div class="box-header">
                        </div>
                        <div class="box-body">
                            <table  class="table table-bordered table-striped" id="tabla-listado-insumos">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>descripcion</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary procesarForm btn-opc pull-right']) !!}
    </div>

</div>



