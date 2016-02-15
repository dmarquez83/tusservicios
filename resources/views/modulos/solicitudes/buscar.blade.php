{!! Form::open(array('route' => 'buscar-categorias', 'method' => 'GET', 'class' => '', 'role' => 'search')) !!}
<div class="input-group">
    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar Categoria']) !!}
    <span class="input-group-btn">
        {!! Form::submit('Buscar', ['class' => "btn btn-primary btn-flat"]) !!}
    </span>
</div>
{!! Form::close() !!}


