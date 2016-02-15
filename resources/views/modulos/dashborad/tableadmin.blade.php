@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>2</h3>

                        <p>Servicios Solicitados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>4</h3>

                        <p>Servicios en Proceso</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cog"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>5</h3>

                        <p>Servicios Ejecutados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>2</h3>

                    <p>Servicios por Cobrar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>4</h3>

                    <p>Servicios por Pagar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>5</h3>

                    <p>Cotizaciones Aprobadas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-star"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>2</h3>

                    <p>Cotizacion Rechazada</p>
                </div>
                <div class="icon">
                    <i class="fa fa-times"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>4</h3>

                    <p>Proveedores Activos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>5</h3>

                    <p>Proveedores por Activar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    </div>


    </div>
@endsection