<!DOCTYPE html>
<html lang="en">
<head>
    <title>TusServicios.com.ve</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php include_once './header.php'; ?>
<div class="row">
    <div class="col s12 m4 l2 hide-on-med-and-down">
        <?php include_once './menu.php'; ?>
    </div>

    <div class="col m12 l10"> <!-- Note that "m8 l9" was added -->
        <div class="row">
            <div class="col s12">
                <h4 >Categorías de Servicios</h4>
                <form>
                    <div class="input-field">
                        <input id="search" type="search" required class="grey lighten-4">
                        <label for="search" class="valign-wrapper black-text flow-text">
                            <i class="material-icons">search</i>
                            Encuentra el servicio que necesitas
                        </label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">


            <div class="col s12 m6 l4">
                <div class="card small">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img src="img/serv-electricos.jpg" class="responsive-img">
                    </div>
                    <div class="card-content">
                        <div class="card-title activator grey-text text-darken-4">
                                    <span>
                                        Electricidad
                                        <i class="mdi-navigation-more-vert right"></i>
                                    </span>
                        </div>
                    </div>
                    <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">
                                    Electricidad
                                    <i class="mdi-navigation-close right"></i>
                                </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem, error dolores doloribus iste libero. Facere, at ab perspiciatis autem, blanditiis totam vero quia, iure culpa ipsa voluptates eveniet!</p>
                        <div class="card-action">
                            <a class="right" href="servicios.php"><i class="mdi-content-add-circle"></i>Ver Servicios</a>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="right" href="servicios.php"><i class="mdi-content-add-circle"></i>Ver Servicios</a>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
<?php include_once './footer.php'; ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
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


