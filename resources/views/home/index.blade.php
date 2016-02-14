@extends('layout.home')
@section('content')

    @include('home.partials.header')

    @include('home.partials.menu')

    <section id="categorias-list bg-gray-light">

        <div class="row">
            <div class="col-md-12 col-lg-10 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="text-center">
                                @foreach($categories AS $categorie)
                                    <li class="solid ">
                                        <a class="btn bg-gray border-radius-2" href="#">
                                            <i class="fa fa-gear"></i>
                                            {{ $categorie->nombre }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="hidden-md col-lg-2">
                <div class="box box-solid">
                    <div class="box-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et harum numquam odio omnis pariatur, quia rem sed sequi tenetur. Architecto aspernatur commodi ducimus harum libero modi numquam obcaecati, voluptatum?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et harum numquam odio omnis pariatur, quia rem sed sequi tenetur. Architecto aspernatur commodi ducimus harum libero modi numquam obcaecati, voluptatum?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et harum numquam odio omnis pariatur, quia rem sed sequi tenetur. Architecto aspernatur commodi ducimus harum libero modi numquam obcaecati, voluptatum?</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

