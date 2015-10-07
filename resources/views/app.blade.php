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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	@include('partials.layout.navbar')
	@include('partials.layout.errors')
    @yield('content')
    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    {!! \Skydiver\LaravelMaterializeCSS\MaterializeCSSBuilder::include_js() !!}
    <script>
        $(document).ready(function() {
            $('select').material_select();

            var tab = $('#tabEstatus');

            if(tab != undefined){
                $.get('/estatus',function(r){
                 /*   console.log(r[1]);

                    fila = $('tr');

                    c1 = $('td').text(r[1].nombre);
                    c2 = $('td').text(r[1].descripcion);
                    c3 = $('td').text(r[1].tabla);

                    fila.append(c1);
                    fila.append(c2);
                    fila.append(c3);

                    tab.append(fila);*/

                   /* for(i=0;i< r.length;i++){
                        fila = $('tr');

                        c1 = $('td').text(r[i].nombre);
                        c2 = $('td').text(r[i].descripcion);
                        c3 = $('td').text(r[i].tabla);

                        fila.append(c1);
                        fila.append(c2);
                        fila.append(c3);

                        tab.append(fila);

                    }*/

                })
            }



        });

    </script>


</body>
</html>