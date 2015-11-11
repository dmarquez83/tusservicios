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
                                    <a href="#{{$categoria->nombre}}">Leer Mas</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <img src="categorias-img/{{$categoria->foto}}" alt="{{$categoria->nombre}}" class="img-responsive">
                </div>
                <div class="text-right">
                    <a class="btn btn-primary btn-xs" href="{!! route('categorias.edit', [$categoria->id]) !!}" role="button">Editar</a>
                    <a class="btn btn-danger btn-xs" href="{!! route('categorias.delete', [$categoria->id]) !!}" role="button">Eliminar</a>
                </div>
                <div class="news-content">
                    <p>
                        {{$categoria->decripcion}}
                    </p>

                    <div class="clearfix"></div><!-- clearfix -->

                </div>
                <div id="{{$categoria->nombre}}" class="white-popup mfp-hide">
                    <img src="categorias-img/{{$categoria->foto}}" alt="{{$categoria->nombre}}" class="img-responsive">
                    <p>{{$categoria->decripcion}}</p>
                </div>
            </div>

@endforeach

