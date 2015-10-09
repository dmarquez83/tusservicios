<form method="POST" action="http://localhost:8000/categorias/create" accept-charset="UTF-8" enctype="multipart/form-data">

    <div class="input-field">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>


    <div class="input-field col s12 m12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('decripcion', null, ['class' => 'materialize-textarea']) !!}
    </div>

    <div class="form-group">
        {!! form::label('image','Imagen')!!}
        {!! form::file('foto',null,['class' => 'form-control']) !!}
    </div>

    <div class="row">
        <div class="col s12 m12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>