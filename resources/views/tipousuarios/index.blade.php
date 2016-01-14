@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('tipousuarios.create') !!}">Nuevo</a>
        </div>

        <div class="row">
            @if($tipousuarios->isEmpty())
                <div class="well text-center">No Tipousuarios found.</div>
            @else
                @include('tipousuarios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $tipousuarios])


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