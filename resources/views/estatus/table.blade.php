
<div class="col-xs-12">
    <div class="box box-warning">
        <div class="box-header">
            <h3>Estatus</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th style="width: 30px">Nombre</th>
                    <th style="width: 30px">Descripcion</th>
                    <th style="width: 30px">Tabla</th>
                    <th style="width: 10px" class="text-right">Action</th>
                </tr>

                @foreach($estatus as $estatu)
                    <tr>
                        <th>{!! $estatu->nombre !!}</th>
                        <th>{!! $estatu->descripcion !!}</th>
                        <th>{!! $estatu->tabla !!}</th>
                        <th class="text-right">
                            <a href="{!! route('estatus.edit', [$estatu->id]) !!}"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="{!! route('estatus.delete', [$estatu->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ponderacion?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

