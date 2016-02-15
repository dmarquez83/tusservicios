<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Horas</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Horas</th>
                    <th style="width: 20%">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($horas as $horas)
                    <tr>
                        <td>{!! $horas->id !!}</td>
                        <td>{!! $horas->hora !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.horas.edit', [$horas->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('admin.horas.delete', [$horas->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar esta Hora?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>
