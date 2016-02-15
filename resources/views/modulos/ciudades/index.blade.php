@extends('layout.app')

@section('content')

    <div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.ciudades.create') !!}">Nuevo</a>
        </div>
        <div class="row">
            @if($ciudades->isEmpty())
                <div class="well text-center">No hay ciudades.</div>
            @else
                @include('modulos.ciudades.table')
            @endif
        </div>




    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#ciudades').DataTable({});
        });
    </script>
@endsection