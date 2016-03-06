<!DOCTYPE>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('home.header.title') }}</title>
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/AdminLTE.min.css') !!}
        {!! Html::style('assets/css/skins/skin-black-light.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/ionicons.min.css') !!}
        {!! Html::style('assets/css/app.css') !!}
        {!! Html::style('assets/css/admin.css') !!}

        @yield('styles')

    </head>
    <body class="bg-yellow-active text-black">
        <div class="container-fluid">
            @include('app.partials.navbar')
            <div class="row" >
                <div class="col-sm-12">
                    @include('app.partials.navigation')
                </div>
                <div class="col-sm-12">
                    <div class="container bg-gray-light">
                        <div class="row">
                            <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                                @include('app.partials.menu')
                            </div>
                            <div class="col-lg-10">
                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('app.partials.footer')
        </div>


        <script src="{{ asset('assets/js/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>

        @yield('scripts')
    </body>
</html>
