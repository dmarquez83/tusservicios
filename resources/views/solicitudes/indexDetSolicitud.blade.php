@extends('app')

@section('content')
    <div>

        {!! Form::model($solicitudes, ['route' => ['solicitudes.getAceptarInsumosSolicitud', $solicitudes->id], 'method' => 'post']) !!}

           @include('solicitudes.detSolicitud')

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            var costo=parseFloat($('#costo').data('costo').toFixed(2));
            var total=costo;
            $("#total").text(total);
            $('input:checkbox').removeAttr('checked');
            var check = $('.boton_check');
            check.click(function(){
                var valor=parseFloat($(this).data('valor'));
                if ($(this).prop('checked')){
                    sumar(valor)
                }
                else {
                    restar(valor);
                }
            })

            function sumar(valor) {
                total+=valor;
                $("#total").text(total);
            }
            function restar(valor) {
                total-=valor;
                $("#total").text(total);
            }
        })
    </script>
@endsection
