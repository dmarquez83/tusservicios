@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

          <div class="row">

                @include('tiposervicios.table')

          </div>

        @include('common.paginate', ['records' => $categorias])



    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#tiposervicio').DataTable({});
        });
    </script>
@endsection