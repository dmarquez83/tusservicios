 @foreach($categorias as $categoria)
    <div class="col s12 m7">
        <div class="card small">
            <div class="card-image">
                <img src="categorias-img/{{$categoria->foto}}" alt="{{$categoria->nombre}}" class="responsive-img">
                <span class="card-title"> {{$categoria->nombre}}</span>
            </div>
            <div class="card-content">
                <p> {{$categoria->descripcion}}</p>
            </div>
            <div class="card-action">
                <a class="right" href="{!! route('tiposervicios.createnew', [$categoria->id]) !!}"><i class="mdi-content-add-circle"></i>Agregar Tipos de servicios</a>
            </div>
        </div>
    </div>
@endforeach
