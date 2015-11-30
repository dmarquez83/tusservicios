@extends('app')

@section('content')
<div class="container">
    <div class="col-md-10">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">{!! $categorias[0]->nombre !!}</h3>
            </div>
            <form role="form">
                <div class="box-body">
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('Descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                            <h5>{!! $categorias[0]->descripcion !!}</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Html::image('categorias-img/'.$categorias[0]->foto, '', array('class' => 'responsive-img','width' => '300', 'height' => '200')) !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <a class="btn btn-warning pull-right" href="{{ route('categorias.index') }}">Categorias</a>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Servicios</h3>
                <div class="box-tools">
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                    @foreach($detcategoria as $detcategoria)
                    <tr>
                        <td>{!! $detcategoria->nombre !!}</td>
                        <td>{!! $detcategoria->descripcion !!}</td>
                        <td><a class="description-header" href="{!! route('detalle', [$detcategoria->id]) !!}">Detalle</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection