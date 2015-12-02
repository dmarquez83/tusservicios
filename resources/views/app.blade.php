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
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- LOAD SCRIPTS
{!! Html::script('assets/inc/js/jquery-1.11.0.min.js') !!}
-->
{!! Html::script('assets/inc/jQuery/jQuery-2.1.4.min.js') !!}
<!-- Bootstrap 3.3.5 -->
{!! Html::script('assets/inc/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets/inc/jQueryUI/jquery-ui-1.10.3.min.js') !!}
{!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
{!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('assets/inc/js/app.min.js') !!}

<!-- flexslider -->
{!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}

<!-- script calling -->
{!! Html::script('assets/inc/js/common.js') !!}
{!! Html::script('assets/inc/js/app.min.js') !!}
{!! Html::script('assets/inc/js/app.min.js') !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
{!! Html::script('admin/js/insumos.js') !!}

</body>
</Html>
