<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Sectores</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="sectores">
                <thead>
                <th>Nombre</th>
                <th>Ciudad Id</th>
                <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($sectores as $sector)
                    <tr>
                        <td>{!! $sector->nombre !!}</td>
                        <td>{!! $sector->ciudad_id !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.sectores.edit', [$sector->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.sectores.delete', [$sector->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Sector?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

