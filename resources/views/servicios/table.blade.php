<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="pull-left">Servicios</h1>
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
        <div class="box box-warning">
            <div class="box-header with-border">
                <div class="user-block">
                    <h3>
                    <a href="#">{{$categoria->nombre}}</a>
                    </h3>
                </div>
            <div class="box-body">
                <img src="categorias-img/{{$categoria->foto}}" alt="{{$categoria->nombre}}" class="img-responsive pad">

                <a class="btn btn-default btn-xs pull-right" href="{!! route('serviciostodos.create', [$categoria->id]) !!}" role="button">Agregar</a>

                <a class="btn btn-default btn-xs pull-right" href="#">Comprar <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>

                <!-- <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#//$categoria->nombre">
                Leer Mas
                    <span class="glyphicon glyphicon-plus text-muted" aria-hidden="true"></span>
                </button> -->
            </div>
            <div class="box-footer box-comments">
                <div class="box-comment">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem doloremque ea est fugit illo, illum inventore iusto laborum magni neque quis repellat repellendus saepe unde, vel veritatis vitae voluptatibus?
                </div>
            </div>
            </div>
        </div>
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

