    <div class="form-group">
        <label>{{ trans('Nombre') }}</label>
        {!! Form::input('text', 'nombre',  $categoria->nombre, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        <label>{{ trans('Descripción') }}</label>
        {!! Form::input('text', 'decripcion', $categoria->decripcion, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

    </div>