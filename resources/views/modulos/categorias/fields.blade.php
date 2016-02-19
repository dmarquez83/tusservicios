<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Crear Catgoria</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-12">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}

                </div>
                <div class="col-sm-12">
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    {!! form::label('image','Imagen', ['class' => 'control-label'])!!}
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
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

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-black" style="background: url('') center center;">
            <h3  class="widget-user-username">
                Nombre
            </h3>
        </div>
        <div class="widget-user-image">
            {!! Html::image('/assets/img/categorias-img/thumb_tusservicios-logo.jpg', '', array('class' => 'img-circle')) !!}
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                    <div class="description-block">
                        <p>Descripción</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>