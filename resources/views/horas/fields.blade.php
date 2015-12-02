<!-- Hora Field -->
<div class="box-body">
    <div class="row">
        <div class="bootstrap-timepicker">
            <div class="col-sm-12 form-group">
                {!! Form::label('hora', 'Hora:') !!}
                <div class="input-group">
                    {!! Form::text('hora', null, ['class' => 'form-control timepicker']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Submit Field -->
    <div class="row">
        <div class="form-group col-sm-12 text-right">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-opc']) !!}
        </div>
    </div>
</div>