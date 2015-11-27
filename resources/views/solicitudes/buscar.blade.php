{!! Form::open(array('route' => 'buscar', 'method' => 'GET', 'class' => '', 'role' => 'search')) !!}
<div class="input-group margin">
    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar Categoria']) !!}
    <span class="input-group-btn">
        {!! Form::submit('Buscar', ['class' => "btn btn-primary btn-flat"]) !!}
    </span>
</div>
{!! Form::close() !!}


