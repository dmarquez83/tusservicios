    <form method="POST" action="http://localhost:8000/servicios/create" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">

<!--- Nombre Field --->

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'col-sm-2 control-label']) !!}
        <di class="col-sm-10">
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </di>
    </div>

<!--- Descripcion Field --->

    <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion:', ['class' => 'col-sm-2 control-label']) !!}
        <di class="col-sm-10">
            {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
        </di>
    </div>


<!--- Id Tipo Servicio Field --->
    <div class="form-group">
        {!! Form::label('id_tipo_servicio', 'Tipo Servicio:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('id_tipo_servicio', $tiposervicios, null, ['class' => 'form-control']) !!}
        </div>
    </div>


<!--- Id Estatus Field --->

    <div class="input-field col s12">
        {!! Form::label('id_estatus', 'Id Estatus:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('id_estatus', $estatu, null, ['class' => 'form-control']) !!}
        </div>
    </div>

<!--- Ponderacion Field --->

    <div class="input-field col s12">
        {!! Form::label('ponderacion', 'Ponderacion:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
        </div>
    </div>




    <div class="form-group">
        {!! form::label('foto','Imagen:', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            {!! form::file('foto',null,['class' => 'form-control']) !!}
        </div>
    </div>

<div class="row">
    <div class="col s12 m12">
        {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

</form>