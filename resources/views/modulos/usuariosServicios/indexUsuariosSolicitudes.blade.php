@extends('layout.app')

@section('content')

    <div>

        @include('flash::message')

        <div class="row">
            @include('modulos.usuariosServicios.listado')
        </div>

    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#usuarioSolicitud').DataTable({});
        });
    </script>
@endsection