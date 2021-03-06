<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Registrar Servicios</h3>
        </div>
        <div class="box-body">
            <div class="row">
            <!--- Nombre Field --->
                <div class="col-sm-6 form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                 </div>
            </div>

            <div class="row">
            <!--- Descripcion Field --->
                <div class="col-sm-6 form-group">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>

            <div class="separador"></div>

            <div class="row">
            <!--- Id Tipo Servicio Field --->
                <div class="col-sm-6 form-group">
                    {!! Form::label('categoria', 'Categoria:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('id_tipo_servicio', 'Tipo Servicio:', ['class' => 'control-label']) !!}

                </div>
            </div>
            <!--- Id Estatus Field --->
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control', 'id'=> 'id_categoria', 'data-path' => route('categorias.servicios.desplegable')]) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::select('tiposervicio_id', $tiposervicios, null, ['class' => 'form-control', 'id'=> 'tiposervicio_id']) !!}

                </div>
            </div>

            <div class="row">
                <!--- Ponderacion Field --->
                <div class="col-sm-6 form-group">
                    {!! Form::label('ponderacion', 'Ponderacion:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! form::label('precio','Precio:', ['class' => 'control-label'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! form::number('precio',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {!! form::label('foto','Imagen:', ['class' => 'control-label'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {!! form::file('foto',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary procesarForm btn-opc']) !!}
                </div>
            </div>

        </div>

    </div>
</div>
