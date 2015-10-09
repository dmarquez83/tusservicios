@foreach($servicios as $servicios)

    <div class="col s12 m6 l4">
        <div class="card small">
            <div class="card-image waves-effect waves-block waves-light">
                <img src="servicios-img/{{$servicios->foto}}" alt="{{$servicios->nombre}}" class="responsive-img">
            </div>
            <div class="card-content">
                <div class="card-title activator grey-text text-darken-4">
            <span>
               {{$servicios->nombre}}
                <i class="mdi-navigation-more-vert right"></i>
            </span>
                </div>
            </div>
            <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">
           {{$servicios->nombre}}
            <i class="mdi-navigation-close right"></i>
        </span>
                <p> {{$servicios->descripcion}}</p>
                <div class="card-action">
                    <a class="right" href="servicios.php"><i class="mdi-content-add-circle"></i>Ver Servicios</a>
                </div>
            </div>
            <div class="card-action">
                <a class="right" href="servicios.php"><i class="mdi-content-add-circle"></i>Ver Servicios</a>
            </div>
        </div>
    </div>

@endforeach
