<!--- Nombre Field --->
<div class="row">
    <div class="input-field">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!--- Descripcion Field --->
<div class="row">
    <div class="input-field col s12 m12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'materialize-textarea']) !!}
    </div>
</div>

<!--- Id Tipo Servicio Field --->
<div class="row">
    <div class="input-field col s12">

        {!! Form::select('id_tipo_servicio', $tiposervicios, 'Tipo Servicio:', ['class' => 'form-control']) !!}
        {!! Form::label('id_tipo_servicio', 'Tipo Servicio:') !!}

    </div>
</div>

<!--- Id Estatus Field --->
<div class="row">
    <div class="input-field col s12">

        {!! Form::select('id_estatus', $estatu, null, ['class' => 'form-control']) !!}
        {!! Form::label('id_estatus', 'Id Estatus:') !!}

    </div>
</div>

<!--- Ponderacion Field --->
<div class="row">
    <div class="input-field col s12">

        {!! Form::select('ponderacion', $ponderacion, null, ['class' => 'form-control']) !!}
        {!! Form::label('ponderacion', 'Ponderacion:') !!}

    </div>
</div>

<!--- Submit Field --->

<div class="row">
    <div class="col s12 m12">
        <a class="waves-effect waves-light orange darken-3 right btn" href="des_solicitud.php">
            <i class="mdi-action-add-shopping-cart left"></i>
            Solicitar Servicio
        </a>
    </div>
</div>

<div class="row">
    <div class="col s12 m12">
        {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary']) !!}
    </div>
</div>