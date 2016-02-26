@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="pull-left">Servicios</h1>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                </div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra el Servicio que necesitas">
            </div>
        </div>

        <div class="row">

            @foreach($servicios as $servicio)
                <div class="col-md-4 col-xs-12 text-center">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black" style="background: url('/servicios-img/{{$servicio->foto}}') center center;">
                            <h3 class="widget-user-username">
                            </h3>
                        </div>
                        <div class="widget-user-image">
                            {!! Html::image('categorias-img/thumb_tusservicios-logo.jpg', '', array('class' => 'img-circle')) !!}
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="description-block">
                                        {{$servicio->descripcion}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="description-block">
                                        <h3  class="widget-user-username">
                                            {{$servicio->nombre}}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="description-block">
                                        <a class="description-header" href="{!! route('detalle', [$servicio->id]) !!}" role="button">Ver</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        {{-- @include('common.paginate', ['records' => $categorias]) --}}

    </div>
@endsection