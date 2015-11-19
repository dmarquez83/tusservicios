@foreach($categorias as $categoria)
    <div class="col s12 m7">
        <div class="card small">
            <div class="card-image">
                {!! Html::image('categorias-img/'.$categoria->foto, $categoria->nombre, array('class' => 'img-responsive')) !!}
                <span class="card-title"> {{$categoria->nombre}}</span>
            </div>
            <div class="card-content">
                <p> {{$categoria->descripcion}}</p>
            </div>
            <div class="card-action">
                <a class="right" href="{!! route('admin.servicios.create', [$categoria->id]) !!}"><i class="mdi-content-add-circle"></i>Agregar Servicios</a>
            </div>
        </div>
    </div>
@endforeach