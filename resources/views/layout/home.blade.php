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
        {!! Html::style('assets/css/home.css') !!}

        @yield('styles')

    </head>
    <body>

        @yield('content')

        <script src="{{ asset('assets/js/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>

        @yield('scripts')
    </body>
</html>