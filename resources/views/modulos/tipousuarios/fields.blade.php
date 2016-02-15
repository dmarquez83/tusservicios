<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tipo Usuarios</h3>
        </div>
        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('abreviatura', 'Abreviatura:', ['class' => 'control-label']) !!}
                    {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary procesarForm btn-opc']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

