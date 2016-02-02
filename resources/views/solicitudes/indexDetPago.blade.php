@extends('app')

@section('content')

    <div>
        <div class="form-group col-lg-10 col-md-10 col-sm-10 col-xs-10">
            @include('flash::message')
        </div>
            {!! Form::model($solicitudes, ['route' => ['solicitudes.asignar', $solicitudes->id], 'method' => 'POST']) !!}
            @include('solicitudes.detPago')
            {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function(){
            var costo=parseFloat($('#costo').data('costo'));
            var total=costo;
            totales=parseFloat(total).toFixed(2);
            $("#costo").text(totales);

            inicial=total*0.30;
            inicial=parseFloat(inicial).toFixed(2);
            $("#inicial").text(inicial);

            pendiente=total*0.70;
            pendiente=parseFloat(pendiente).toFixed(2);
            $("#pendiente").text(pendiente);
        })
    </script>
@endsection

