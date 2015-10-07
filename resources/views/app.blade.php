<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicios.com</title>

    {!! \Skydiver\LaravelMaterializeCSS\MaterializeCSSBuilder::include_css() !!}
    <!-- Fonts -->
     <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	@include('partials.layout.navbar')
    <div class="row">

            <div class="col s12 m4 l2 hide-on-med-and-down">
                @include('partials.layout.menu')
            </div>
        @include('partials.layout.errors')

        <!-- Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        {!! \Skydiver\LaravelMaterializeCSS\MaterializeCSSBuilder::include_js() !!}

        <div class="col m12 l10"> <!-- Note that "m8 l9" was added -->
            @yield('content')

        </div>

    </div>

    @include('partials.layout.footer')

    <script>
        $(function () {
            $('select').material_select();
            $('.button-collapse').sideNav({
                        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
                    }
            );
        });
    </script>
</body>
</html>