<div class="col-md-10 col-md-offset-1 col-xs-12">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Categoria</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre Categoria:', ['class' => 'control-label', ]) !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control','id' => 'categoria-nombre']) !!}
                    </div>
                    <div class=" form-group">
                        {!! Form::label('descripcion', 'Descripcion Categoria:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! form::label('image','Imagen Categoria:', ['class' => 'control-label'])!!}
                        <input name="foto" id="categoria-foto" type="file" class="file"  >
                    </div>
                </div>

                <div class="col-xs-12 text-right">
                    {!! Form::submit('Guardar Categoria', ['class' => 'btn bg-blue-active procesarForm ']) !!}
                </div>
            </div>
        </div>
    </div>
</div>