@extends('app')

@section('content')

    <div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>


            {!! Form::model($solicitudes, ['route' => ['solicitudes.asignar', $solicitudes->id], 'method' => 'POST']) !!}

            @include('solicitudes.asignarSolicitud')

            {!! Form::close() !!}

    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#lissolicitud').DataTable({});
        });
    </script>
@endsection

