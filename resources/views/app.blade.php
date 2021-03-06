<!DOCTYPE Html>
<Html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('home.header.title') }}</title>

    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>

    {!! Html::style('assets/inc/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/AdminLTE.min.css') !!}
    <!-- Bootstrap time Picker -->
    {!! Html::style('assets/inc/bootstrap/css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/datepicker3.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/skins/skin-black-light.css') !!}
    {!! Html::style('assets/css/main.css') !!}

</head>
<body class="skin-blue-light sidebar-mini">

@if(\Session::has('message'))
    @include('home.partials.message')
@endif

<div class="page-loader"></div>

<div class="wrapper">
    @include('partials.layout.navbar')
    @include('partials.layout.menu')
    <div class="content-wrapper">
        <section class="content">
            @include('partials.layout.errors')
            @yield('content')
        </section>
    </div>
    @include('partials.layout.footer')
</div><!-- l-wrapper -->

<!-- Footer -->
<!-- LOAD SCRIPTS
{!! Html::script('assets/inc/js/jquery-1.11.0.min.js') !!}
-->
{!! Html::script('assets/inc/jQuery/jQuery-2.1.4.min.js') !!}
<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/inc/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets/inc/jQueryUI/jquery-ui-1.10.3.min.js') !!}

@yield('scripts')

@yield('scripts-modulo')


</body>
</Html>
