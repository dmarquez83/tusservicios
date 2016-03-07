<!DOCTYPE>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
        <title>{{ trans('home.header.title') }}</title>
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/AdminLTE.min.css') !!}
        {!! Html::style('assets/css/skins/skin-blue-light.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/ionicons.min.css') !!}
        {!! Html::style('assets/css/admin.css') !!}
        {!! Html::style('assets/css/app.css') !!}

        @yield('styles')

    </head>
    <body class="skin-blue-light text-black">
        <div class="container-fluid bg-gray-alt text-black">
            @include('app.partials.navbar')
            <div class="row" >
                <div class="col-sm-12">
                    @include('app.partials.navigation')
                </div>
                <div class="col-sm-12">
                    <div class="container">
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
        </div>
        @include('app.partials.footer')


        <script src="{{ asset('assets/js/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>

        @yield('scripts')
    </body>
</html>
