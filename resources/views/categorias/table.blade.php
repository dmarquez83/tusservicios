@foreach($categorias as $categoria)

    <div class="col s12 m6 l4">
        <div class="card small">
            <div class="card-image waves-effect waves-block waves-light">
                <img src="categorias-img/{{$categoria->foto}}" alt="{{$categoria->nombre}}" class="responsive-img">
            </div>
            <div class="card-content">
                <div class="card-title activator grey-text text-darken-4">
            <span>
               {{$categoria->nombre}}
                <i class="mdi-navigation-more-vert right"></i>
            </span>
                </div>
            </div>
            <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">
           {{$categoria->nombre}}
            <i class="mdi-navigation-close right"></i>
        </span>
                <p> {{$categoria->decripcion}}</p>
                <div class="card-action">
                    <a class="right" href="{!! route('categorias.delete', [$categoria->id]) !!}"><i class="mdi-content-add-circle"></i>Eliminar</a>
                </div>
            </div>
            <div class="card-action">
                <a class="right" href="{!! route('categorias.edit', [$categoria->id]) !!}"><i class="mdi-content-add-circle"></i>Editar</a>
            </div>
        </div>
    </div>

@endforeach
