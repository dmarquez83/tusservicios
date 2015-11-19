@extends('home.app')
@section('content')
    @include('home.partials.header')


    <div class="menu-wrap">
        @include('home.partials.menu')
    </div><!-- content -->


    <div class="l-content-wrap" id="standard-content">

        <section>

            @include('home.partials.home')

        </section>


        <!-- WHAT WE DO PARALAX SECTION -->
        <section>

            @include('home.partials.que_hacemos')

        </section>

        <!-- LATEST POSTS SECTION -->
        <section>

            @include('home.partials.noticias')

        </section>

        <!-- TESTIMONIALS PARALAX SECTION -->
        <section>

            @include('home.partials.testimonios')

        </section>

        <!-- TECHNICAL SKILLS SECTION -->
        <section>

            @include('home.partials.skills')

        </section>

        <!-- GALLERY SECTION -->
        <section>

            @include('home.partials.galeria')

        </section>

        <!-- LATEST POSTS SECTION -->
        <section>

            @include('home.partials.contact')

        </section>

        <!-- TECHNICAL SKILLS SECTION -->
        <section>

            @include('home.partials.contact2')

        </section>


@endsection

