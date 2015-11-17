@foreach($servicios as $servicios)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-warning">
            <div class="box-header with-border">
                <div class="user-block">
                    <h3>
                        <a href="#">{{$servicios->nombre}}</a>
                    </h3>
                </div>
                <div class="box-body">
                    <img src="servicios-img/{{$servicios->foto}}" alt="{{$servicios->nombre}}" class="img-responsive pad">
                    <a class="btn btn-default btn-xs pull-right" href="{!! route('servicios.delete', [$servicios->id]) !!}">Eliminar</a>
                    <a class="btn btn-default btn-xs pull-right" href="{!! route('servicios.edit', [$servicios->id]) !!}">Editar</a>
                </div>
                <div class="box-footer box-comments">
                    <div class="box-comment">
                        {{$servicios->descripcion}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
