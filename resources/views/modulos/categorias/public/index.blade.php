@extends('layout.app')
@section('content')

    <div class="row">

        @include('modulos.publicidad.public.horizontal')

        <div class="col-sm-12 col-md-10">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="margin-bottom">Categorías</h1>
                </div>
                <?php $i = 0;  ?>
                @foreach($categorias as $categoria)

                    <div class="col-md-3 col-sm-4 col-xs-6 text-center">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header bg-black" style="background: url('../assets/img/categorias-img/{{$categoria->foto}}') center center;">
                            </div>
                            <div class="widget-user-image">
                                {!! Html::image('assets/img/thumb-tusservicios-logo.jpg', '', array('class' => 'img-circle bg-white')) !!}
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
                                            <h3  class="widget-user-username">
                                                {{$categoria->nombre}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <a class="btn btn-sm bg-blue-active" href="{!! route('public.categorias.show', [$categoria->id]) !!}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm bg-orange-active" href="{!! route('public.servicios.index', [$categoria->id]) !!}" role="button">
                                            <i class="fa fa-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @if( $i % 8 == 0)
                        @include('modulos.publicidad.public.horizontal')
                    @endif
                @endforeach
                @include('modulos.publicidad.public.horizontal')
            </div>
        </div>
        <div class="hidden-sm hidden-xs col-md-2">
            @include('modulos.publicidad.public.vertical')
            @include('modulos.publicidad.public.vertical')
            @include('modulos.publicidad.public.vertical')
            @include('modulos.publicidad.public.vertical')
        </div>

    </div>

@endsection
