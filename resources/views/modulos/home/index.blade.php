@extends('layout.home')
@section('content')

    @include('modulos.home.partials.header')

    @include('modulos.home.partials.menu')

    @include('modulos.home.partials.categorias')

    <div class="container-fluid">
        <h3 class="text-center margin padding"> Publicidad</h3>
    </div>

    @include('modulos.home.partials.que_hacemos')

    <div class="clearfix"></div>

    @include('modulos.home.partials.testimonios')

    <div class="container-fluid">
        <h3 class="text-center margin padding"> Publicidad</h3>
    </div>

    @include('modulos.home.partials.contacto')

    @include('modulos.home.partials.footer')
@endsection

