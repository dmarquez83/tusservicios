<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
        </div>
        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra la categotia que necesitas para tu tipo Servicio">
    </div>
</div>
<br>
<br>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Categorias - Tipo de Servicios</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="tiposervicio">
                <thead>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->descripcion}}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!!route('tiposServicio', [$categoria->id]) !!}" role="button" data-toggle="Agregar Tipos de servicios"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


