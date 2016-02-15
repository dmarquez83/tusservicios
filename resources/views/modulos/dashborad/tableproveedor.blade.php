@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>2</h3>

                        <p>Servicios por Asignados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-square-o"></i>
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

                        <p>Servicios por Cobrar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
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
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection