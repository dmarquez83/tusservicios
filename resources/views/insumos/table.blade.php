<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra los servicios que necesitas">
    </div>
</div>

<br>
<br>
@foreach($insumos as $insumo)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('{{ asset('insumos-img/'.$insumo->foto)}}') center center;">
                <h3  class="widget-user-username">

                </h3>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <p>
                                {{$insumo->descripcion}}
                            </p>
                        </div>
                        <div class="description-block">
                            <p>
                                {{$insumo->referencia}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('insumos.edit', [$insumo->id]) !!}" role="button">Editar</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('insumos.delete', [$insumo->id]) !!}" role="button">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

