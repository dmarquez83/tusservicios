{!! Form::open(array('route' => 'buscar-categorias', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search')) !!}
<div class="form-group">
    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar Categoria']) !!}
</div>
{!! Form::submit('Buscar', ['class' => "btn btn-default"]) !!}
{!! Form::close() !!}
@foreach($categorias as $categoria)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('../categorias-img/{{$categoria->foto}}') center center;">
                <h3  class="widget-user-username">
                    {{$categoria->nombre}}
                </h3>
            </div>
            <div class="widget-user-image">
                {!! Html::image('categorias-img/thumb_tusservicios-logo.jpg', '', array('class' => 'img-circle')) !!}
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <p>{{$categoria->decripcion}}</p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <a class="description-header pull-right" href="{!! route('servicios.index', [$categoria->id]) !!}" role="button">Ver Servicios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach