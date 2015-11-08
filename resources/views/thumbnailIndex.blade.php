@extends('app')
@section('content')
    <div >
        <div >
            <div>
                <div >
                    <div>Listado de Imagenes
                        <a href="" class="btn-xs btn-primary pull-right" role="button">Agregar</a>
                    </div>

                    <div class="row">
                        @foreach($thumbnails as $thumbnail)

                            <div class="col s12 m6 l4">
                                <div class="card small">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img src="thumbnails/{{$thumbnail->image}}" alt="{{$thumbnail->name}}" class="responsive-img">
                                    </div>
                                    <div class="card-content">
                                        <div class="card-title activator grey-text text-darken-4">
                                    <span>
                                       {{$thumbnail->name}}
                                        <i class="mdi-navigation-more-vert right"></i>
                                    </span>
                                        </div>
                                    </div>
                                    <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">
                                   {{$thumbnail->name}}
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
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
