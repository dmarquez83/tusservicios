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
                                {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control', 'id'=> 'id_categoria', 'data-path' => route('usuario.servicios.desplegable')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Servicios</label>
                                {!! Form::select('servicio_id',$servicios, null, ['class' => 'form-control', 'id'=> 'servicio_id']) !!}
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
                                                @foreach($dias as $dia)
                                                    <th>{{$dia->dia}}</th>
                                                @endforeach
                                            </tr>
                                            @foreach($horas as $hora)
                                                <tr>
                                                    <td>{{$hora->hora}}</td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                              {!! Form::checkbox('horario['.$hora->id.$dias[0]->id.']', $dias[0]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                             {!! Form::checkbox('horario['.$hora->id.$dias[1]->id.']', $dias[1]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                              {!! Form::checkbox('horario['.$hora->id.$dias[2]->id.']', $dias[2]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                             {!! Form::checkbox('horario['.$hora->id.$dias[3]->id.']', $dias[3]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                              {!! Form::checkbox('horario['.$hora->id.$dias[4]->id.']', $dias[4]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                              {!! Form::checkbox('horario['.$hora->id.$dias[5]->id.']', $dias[5]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="input-group-addon">
                                                             {!! Form::checkbox('horario['.$hora->id.$dias[6]->id.']', $dias[6]->id.'-'.$hora->id, false) !!}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach

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
                                                @foreach($ciudades as $ciudad)
                                                    <div class="checkbox">
                                                        <label>
                                                            {!! Form::checkbox('ciudad', $ciudad->id, false,['class' => 'ciudad', 'data-path' => route('admin.sectores.listado',$ciudad->id)]) !!} {{$ciudad->nombre}}
                                                        </label>

                                                    </div>
                                                @endforeach
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

                                        <div class="form-group sectores">



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