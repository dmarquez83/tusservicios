@extends('app')

@section('content')
<div class="">
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')


                {!! Form::open(['route' => ['solicitudes.store', $servicios], 'method' => 'GET', 'files' => 'true']) !!}

            @include('solicitudes.fields')

                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts-modulo')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/insumos.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/bootstrap-timepicker.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/bootstrap-datepicker.js') !!}

    {!! Html::script('assets/inc/bootstrap/js/jquery.inputmask.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/jquery.inputmask.date.extensions.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/jquery.inputmask.extensions.js.js') !!}

    <!-- flexslider -->
    {!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}

    <script type="text/javascript">
        $(function () {
            $("#table-listado-insumos").DataTable();
            $("[data-mask]").inputmask();
            $("#hora").timepicker();
            $("#fecha").datepicker();
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@endsection
