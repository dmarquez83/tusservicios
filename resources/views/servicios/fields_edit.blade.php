<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Registrar Servicios</h3>
        </div>
            <form method="POST" action="http://localhost:8000/servicios/create" accept-charset="UTF-8" enctype="multipart/form-data">
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
                    {!! Form::label('id_tipo_servicio', 'Tipo Servicio:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('id_estatus', 'Id Estatus:', ['class' => 'control-label']) !!}

                </div>
            </div>
            <!--- Id Estatus Field --->
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::select('id_tipo_servicio', $tiposervicios, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::select('id_estatus', $estatu, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <!--- Ponderacion Field --->
                <div class="col-sm-6 form-group">
                    {!! Form::label('ponderacion', 'Ponderacion:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! form::label('foto','Imagen:', ['class' => 'control-label'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::file('foto',null,['class' => 'form-control']) !!}
                    {!! Form::hidden('foto_name', $servicios[0]->foto) !!}
                </div>
            </div>




<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
        {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary procesarForm btn-opc']) !!}
    </div>
</div>
        </div>
</form>
        </div>
</div>
