@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <a class="btn btn-sm bg-orange pull-right" href="{{ route('categorias.index') }}">
                        <i class="fa fa-list-alt"></i> Todas Categorias
                    </a>
                    <h3 class="box-title">{!! $categoria->nombre !!}</h3>

                </div>
                <form role="form">
                    <div class="box-body">
                        <div class="col-md-7">
                            <div class="text-center margin">
                            {!! Html::image('assets/img/categorias-img/'.$categoria->foto, '', array('class' => 'responsive-img thumbnail img-300-200')) !!}
                            </div>

                            <p>{{ $categoria->descripcion }}</p>

                        </div>
                        <div class="col-md-5">

                            <div class="list-group">
                                <li class="list-group-item">
                                    <h4>Tipos de Servicios</h4>
                                </li>
                                @foreach( $categoria->tiposervicio AS $tipo )
                                <a href="#" class="list-group-item" data-id="{{ $tipo->id }}">
                                    <span class="badge bg-blue-active">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    {{ $tipo->nombre }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">Servicios</h3>
                    <div class="box-body">
                        <div class="media">
                            @foreach($servicios AS $servicio)
                                <div class="media-left media-middle">
                                    <a href="{{ route('servicios.index') }}">
                                        {!! Html::image('assets/img/servicios-img/'.$servicio->foto, '', array('class' => 'media-object thumbnail responsive-img img-64')) !!}
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $servicio->nombre }}</h4>
                                    <p>{{ substr($servicio->descripcion,0,30) }}...</p>
                                    <a href="{{ route('detalle',$servicio->id) }}" class="" >Detalles</a>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Publicidad</h3>
                </div>
            </div>
        </div>
    </div>
@endsection