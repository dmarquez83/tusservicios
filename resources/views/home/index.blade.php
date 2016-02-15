@extends('layout.home')
@section('content')

    @include('home.partials.header')

    @include('home.partials.menu')

    @include('home.partials.categorias')

    <div class="container-fluid">
        <h3 class="text-center margin padding"> Publicidad</h3>
    </div>

    @include('home.partials.que_hacemos')

    <div class="clearfix"></div>

    @include('home.partials.testimonios')

    <div class="container-fluid">
        <h3 class="text-center margin padding"> Publicidad</h3>
    </div>

    @include('home.partials.contacto')

    @include('home.partials.footer')
@endsection

