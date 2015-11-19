<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="pull-left">Categorias</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('categorias.create') !!}">Agregar</a>
</div>

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
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('categorias-img/{{$categoria->foto}}') center center;">
                <h3  class="widget-user-username">
                    {{$categoria->nombre}}
                </h3>
            </div>
            <div class="widget-user-image">
                <img src="categorias-img/user1-128x128.jpg" alt="user1-128x128.jpg" class="img-circle">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto blanditiis commodi cumque doloremque error, id ipsum iure odio omnis perspiciatis placeat porro quam quibusdam sequi, sunt ullam voluptas voluptatum!
                            </p>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('categorias.edit', [$categoria->id]) !!}" role="button">Editar</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('categorias.delete', [$categoria->id]) !!}" role="button">Eliminar</a>
=======
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
                                {{$categoria->descripcion}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
>>>>>>> origin/back
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

