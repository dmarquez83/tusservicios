<form method="POST" action="http://localhost:8000/servicios/create" accept-charset="UTF-8" enctype="multipart/form-data">

<!--- Nombre Field --->

    <div class="input-field">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>



<!--- Descripcion Field --->

    <div class="input-field col s12 m12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'materialize-textarea']) !!}
    </div>


<!--- Id Tipo Servicio Field --->

    <div class="input-field col s12">

        {!! Form::select('id_tipo_servicio', $tiposervicios, null, ['class' => 'form-control']) !!}
        {!! Form::label('id_tipo_servicio', 'Tipo Servicio:') !!}

    </div>


<!--- Id Estatus Field --->

    <div class="input-field col s12">

        {!! Form::select('id_estatus', $estatu, null, ['class' => 'form-control']) !!}
        {!! Form::label('id_estatus', 'Id Estatus:') !!}

    </div>


<!--- Ponderacion Field --->

    <div class="input-field col s12">

        {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
        {!! Form::label('ponderacion', 'Ponderacion:') !!}

    </div>




    <div class="form-group">
        {!! form::label('foto','Imagen:')!!}
        {!! form::file('foto',null,['class' => 'form-control']) !!}
    </div>




<div class="row">
    <div class="col s12 m12">
        {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

</form>