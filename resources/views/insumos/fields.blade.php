<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Insumos</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('referencia', 'Referencia:', ['class' => 'control-label']) !!}
                    {!! Form::text('referencia', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! form::label('image','Imagen', ['class' => 'control-label'])!!}
                    {!! form::file('foto',null,['class' => 'form-control']) !!}
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