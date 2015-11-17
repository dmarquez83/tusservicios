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
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('categorias-img/{{$categoria->foto}}') center center;">
                    <h3 class="widget-user-username">
                        {{$categoria->nombre}}
                    </h3>
            </div>
            <div class="widget-user-image">
                <img src="servicios-img/user1-128x128.jpg" alt="{{$categoria->nombre}}" class="img-circle">
            </div>

            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem doloremque ea est fugit illo, illum inventore iusto laborum magni neque quis repellat repellendus saepe unde, vel veritatis vitae voluptatibus?
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="description-block">
                            <a class="description-header" href="{!! route('serviciostodos.create', [$categoria->id]) !!}" role="button">Agregar</a>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <a class="description-header" href="#">Comprar <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

