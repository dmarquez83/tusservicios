<!-- Dia Field -->
<div class="box-body">
    <div class="row">
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('dia', 'Dia:') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('dia', null, ['class' => 'form-control','data-inputmask'=>'"alias": "dd/mm/yyyy"', 'data-mask']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 text-right">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>