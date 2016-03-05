<!DOCTYPE>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('home.header.title') }}</title>
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/AdminLTE.min.css') !!}
        {!! Html::style('assets/css/skins/skin-blue-light.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/ionicons.min.css') !!}

        @yield('styles')

    </head>
    <body class="sidebar-mini skin-blue-light">
        <div class="wrapper" >
            @include('admin.partials.navbar')
            @include('admin.partials.menu')
            <div class="content-wrapper">
                <section class="content">
                    @include('admin.partials.navigation')
                    @include('admin.partials.errors')
                    @yield('content')
                </section>
            </div>
        </div><!-- l-wrapper -->
        @include('admin.partials.footer')

        <script src="{{ asset('assets/js/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>

        @yield('scripts')
    </body>
</html>
