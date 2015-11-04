@foreach($servicios as $servicio)
    <div class="col s6 m4">
        <div class="blog-card" >
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">

                    {!! Html::image('servicios-img/'.$servicio->foto, '', array('class' => '')) !!}

                </div>
                <ul class="card-action-buttons">
                    <li>
                        <a class="btn-floating orange darken-3" href="sol_servicios.php"><i class="mdi-action-add-shopping-cart"></i></a>
                    </li>
                </ul>
                <div class="card-content">
                    <div class="card-title activator grey-text text-darken-4">
                        <span>
                             {{$servicio->nombre}}
                            <i class="mdi-navigation-more-vert right"></i>
                        </span>
                    </div>
                </div>
                <div class="card-reveal">
                    <spand class="card-title grey-text text-darken-4">
                        {{$servicio->nombre}}
                        <i class="mdi-navigation-close right"></i>
                    </spand>
                    <p>{{$servicio->descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
