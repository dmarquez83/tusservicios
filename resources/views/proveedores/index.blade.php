@extends('app')

@section('content')

    <div>

        @include('flash::message')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('admin.proveedores.create') !!}">Agregar Proveedor</a>
        </div>

        <div class="row">
            @if($proveedores->isEmpty())
                <div class="well text-center">No Proveedores found.</div>
            @else
                @include('proveedores.table')
            @endif
        </div>




    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
    <!-- flexslider -->
    {!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}

    <script type="text/javascript">
        $(function () {
            $("#example1").DataTable();

            $('#example2').DataTable();
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>



@endsection