@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('user.servicios.create') !!}">Nuevo</a>
        </div>

        <div class="row">
            @include('usuariosServicios.table')
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#tipousuario').DataTable({});
        });
    </script>
@endsection