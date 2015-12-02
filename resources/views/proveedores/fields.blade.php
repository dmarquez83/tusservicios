
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('rif', 'Rif:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('rif', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('rnc', 'Rnc:', ['class' => 'control-label']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('correo', 'Correo:', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::text('rnc', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary procesarForm btn-opc']) !!}
                </div>
            </div>

        </div>


