{!! Form::open(array('route' => 'search', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search')) !!}
<div class="form-group">
    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar Categoria']) !!}
</div>
{!! Form::submit('Buscar', ['class' => "btn btn-default"]) !!}
{!! Form::close() !!}

{{-- <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1 class="pull-left">Categorias</h1>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra el Servicio que necesitas">
    </div>
</div>
 --}}

