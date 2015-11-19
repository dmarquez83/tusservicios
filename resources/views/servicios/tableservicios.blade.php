@foreach($servicios as $servicios)

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('categorias-img/{{$servicios->foto}}') center center;">
                <h3 class="widget-user-username">
                    {{$servicios->nombre}}
                
            </div>
            <div class="widget-user-image">
                <img src="servicios-img/user1-128x128.jpg" alt="{{$servicios->nombre}}" class="img-circle">
            </div>

            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <p>{{$servicios->descripcion}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('servicios.delete', [$servicios->id]) !!}">Eliminar</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('servicios.edit', [$servicios->id]) !!}">Editar</a>
                        </div>
                    </div>
                </div>

            <div class="card-reveal">

                <p> {{$servicios->descripcion}}</p>
                <div class="card-action">
                    <a class="right" href="{!! route('categorias.servicios.delete', [$servicios->id]) !!}"><i class="mdi-content-add-circle"></i>Eliminar</a>
                </div>
            </div>
            <div class="card-action">
                <a class="right" href="{!! route('categorias.servicios.edit', [$servicios->id]) !!}"><i class="mdi-content-add-circle"></i>Editar</a>

            </div>
        </div>
    </div>
@endforeach
