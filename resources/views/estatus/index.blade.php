@extends('app')

@section('content')
    <div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('estatus.create') !!}">Nuevo</a>
        </div>

        <div class="row">
            @if($estatus->isEmpty())
                <div class="well text-center">No Estatus found.</div>
            @else
                @include('estatus.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $estatus])
    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#estatus').DataTable({});
        });
    </script>
@endsection