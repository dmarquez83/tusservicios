<div class="col-xs-2">
</div>
<div class="col-xs-8">
    <div class="box box-warning">
        <div class="box-header">
            <h3>Ponderacions</h3>
        </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th style="width: 30px">Valor</th>
                    <th style="width: 60px">Nombre</th>
                    <th style="width: 10px" class="text-right">Action</th>
                </tr>
                @foreach($ponderacions as $ponderacion)
                    <tr>
                        <th>{!! $ponderacion->valor !!}</th>
                        <th>{!! $ponderacion->nombre !!}</th>
                        <th class="text-right">
                            <a href="{!! route('ponderacions.edit', [$ponderacion->id]) !!}"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="{!! route('ponderacions.delete', [$ponderacion->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ponderacion?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-xs-2">

</div>