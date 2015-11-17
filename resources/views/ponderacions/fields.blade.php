<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Ponderacions</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('valor', 'Valor:',['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary procesarForm btn-opc']) !!}
                </div>
            </div>
        </div>
    </div>
</div>