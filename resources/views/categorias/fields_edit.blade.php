<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Catgoria</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('image','Imagen', ['class' => 'control-label'])!!}
                </div>
                <div class="col-sm-6">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::file('foto',null,['class' => 'form-control']) !!}
                    {!! Form::hidden('foto_name', $categoria->foto) !!}
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