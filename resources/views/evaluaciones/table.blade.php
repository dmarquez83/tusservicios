<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Evaluaciones</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="evaluaciones">
                <thead>
                <th>Valor</th>
                <th>Nombre</th>
                <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($evaluaciones as $evaluaciones)
                    <tr>
                        <td>{!! $evaluaciones->valor !!}</td>
                        <td>{!! $evaluaciones->nombre !!}</td>
                        <td>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('evaluaciones.edit', [$evaluaciones->id]) !!}" role="button" data-toggle="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                            </div>
                            <div class="col-sm-6 border-right">
                                <a class="btn btn-primary" href="{!! route('evaluaciones.delete', [$evaluaciones->id]) !!}" onclick="return confirm('Esta seguro que desea eliminar el Evaluacion?')" role="button" data-toggle="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


