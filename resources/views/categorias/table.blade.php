<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra el Servicio que necesitas">
    </div>
</div>
<br>
<br>

@foreach($categorias as $categoria)

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="m-image-wrap">
                    <div class="hover-wrap">
                        <div class="image-hover">
                            <div class="categories">
                                <a href="#">{{$categoria->nombre}}</a>
                                <div class="m-heading-border"></div>
                            </div>
                            <div class="post-meta">
                                <div class="post-comments text-left">
                                    .
                                </div><!-- comments -->
                                <div class="post-date text-right">
                                    <button type="button" class="btn btn-link text-muted" data-toggle="modal" data-target="#{{$categoria->nombre}}">
                                        Leer Mas
                                        <span class="glyphicon glyphicon-plus text-muted" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Html::image('categorias-img/'.$categoria->foto, $categoria->nombre, array('class' => 'img-responsive')) !!}
                </div>
                <div class="text-right">
                    <a class="btn btn-primary btn-xs" href="{!! route('admin.categorias.edit', [$categoria->id]) !!}" role="button">Editar</a>
                    <a class="btn btn-danger btn-xs" href="{!! route('admin.categorias.delete', [$categoria->id]) !!}" role="button">Eliminar</a>
                </div>
                <br>
                <br>
                <!-- Modal -->
                <div id="{{$categoria->nombre}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{$categoria->nombre}}</h4>
                            </div>
                            <div class="modal-body">
                                {{$categoria->decripcion}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endforeach

