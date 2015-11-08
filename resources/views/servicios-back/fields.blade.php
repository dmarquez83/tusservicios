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

        {!! Form::select('id_tipo_servicio', $tiposervicios, 'Tipo Servicio:', ['class' => 'form-control']) !!}
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
        {!! form::label('image','Imagen')!!}
        {!! form::file('foto',null,['class' => 'form-control']) !!}
    </div>

    <form action="#">
        <div class="file-field input-field">
            <div class="btn">
                <span>Imagen</span>
                <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Sube una imagen">
            </div>
        </div>
    </form>

<!--- Submit Field


    <div class="col s12 m12">
        <a class="waves-effect waves-light orange darken-3 right btn" href="des_solicitud.php">
            <i class="mdi-action-add-shopping-cart left"></i>
            Solicitar Servicio
        </a>
    </div>
--->



<div class="row">
    <div class="col s12 m12">
        {!! Form::submit(' Solicitar Servicio', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

</form>