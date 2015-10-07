
<div class="form-group">
    <label>{{ trans('Nombre') }}</label>
    {!! Form::input('text', 'nombre',  '', ['class'=> 'form-control']) !!}
</div>


<div class="form-group">
    <label>{{ trans('Descripción') }}</label>
    {!! Form::input('text', 'descripcion', '', ['class'=> 'form-control']) !!}
</div>

<!--- Id Categoria Field --->

{{--
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_categoria', 'Id Categoria:') !!}
	{!! Form::select('animal', array(
    'Cats' => array('leopard' => 'Leopard'),
    'Dogs' => array('spaniel' => 'Spaniel'),
), null, ['class' => 'form-control']) !!}
</div>
--}}

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_categoria', 'Id Categoria:') !!}
    {!! Form::select('id_categoria', $categorias, null, ['class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

{{--
@foreach($categorias as $categoria)
    <tr>
        <td>{!! $categoria->nombre !!}</td>
        <td>{!! $categoria->decripcion !!}</td>
    </tr>
@endforeach
--}}