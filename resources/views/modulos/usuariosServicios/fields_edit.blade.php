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

                                {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control', 'id'=> 'id_categoria', 'data-path' => route('user.servicios.desplegable')]) !!}
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
                                            @foreach($horarios as $hora)
                                                <tr>
                                                    <td>{{$hora->hora}}</td>
                                                    @foreach($dias as $dia)
                                                        <td>
                                                        <span class="input-group-addon">
                                                            @if(substr($hora->lunes,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->lunes.']', $dia->id.'-'.substr($hora->lunes,0,1), true) !!}
                                                            @elseif(substr($hora->martes,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->martes.']', $dia->id.'-'.substr($hora->martes,0,1), true) !!}
                                                            @elseif(substr($hora->miercoles,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->miercoles.']', $dia->id.'-'.substr($hora->miercoles,0,1), true) !!}
                                                            @elseif(substr($hora->jueves,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->jueves.']', $dia->id.'-'.substr($hora->jueves,0,1), true) !!}
                                                            @elseif(substr($hora->viernes,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->viernes.']', $dia->id.'-'.substr($hora->viernes,0,1), true) !!}
                                                            @elseif(substr($hora->sabado,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->sabado.']', $dia->id.'-'.substr($hora->sabado,0,1), true) !!}
                                                            @elseif(substr($hora->domingo,1,1) == $dia->id)
                                                                {!! Form::checkbox('horario['.$hora->domingo.']', $dia->id.'-'.substr($hora->domingo,0,1), true) !!}
                                                            @else
                                                                {!! Form::checkbox('horario['.$hora->id.$dia->id.']', $dia->id.'-'.$hora->id, false) !!}
                                                            @endif
                                                        </span>

                                                        </td>
                                                    @endforeach
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
                                            @foreach($ciudades as $ciudad)
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                {!! Form::checkbox('ciudad', $ciudad->id, false,['class' => 'ciudad', 'data-path' => route('user.sectores.listado',$ciudad->id)]) !!} {{$ciudad->nombre}}
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

                                  @foreach($lugares as $lugar)
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        {!! Form::checkbox('sectores', $lugar->sector_id, true,['class' => 'checkbox']) !!} {{$lugar->nombre}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                   @endforeach
                                      <div class="sectores">

                                      </div>

                               </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        @if(auth()->user()->id_tipo_usuario == '2')

            <div class="box-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-warning pull-right']) !!}
                </div>

            </div>

        @endif
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>
    </div>
</div>