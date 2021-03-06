<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tipo Usuarios</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                    {!! Form::input('text', 'nombre',  $tiposervicio->nombre, ['class'=> 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('descripcion', null,['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('id_categoria', 'Categoria:', ['class' => 'control-label']) !!}
                    {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control']) !!}
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
