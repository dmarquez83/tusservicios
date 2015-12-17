<div class="box-body">
    <div class="row">
        <div class="col-sm-4 form-group">
            {!! Form::label('usuario_servicio_id', 'Usuario Servicio Id:', ['class' => 'control-label']) !!}
        </div>
        <div class="col-sm-4 form-group">
            {!! Form::label('hora_id', 'Hora Id:', ['class' => 'control-label']) !!}
        </div>
        <div class="col-sm-4 form-group">
            {!! Form::label('dia_id', 'Dia Id:', ['class' => 'control-label']) !!}
        </div>

    </div>
    <div class="row">
        <div class="col-sm-4">
            {!! Form::text('usuario_servicio_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('hora_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('dia_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group col-sm-12 text-right">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

