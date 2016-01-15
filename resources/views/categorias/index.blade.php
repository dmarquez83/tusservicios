@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar Categorias</a>
        </div>
            <div class="row">
                @if($categorias->isEmpty())
                    <div class="well text-center">Categoria no encontrada.</div>
                @else
                    @include('categorias.table')

                @endif
            </div>

    </div>
@endsection

@section('scripts')

    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
        <!-- bootstrap time picker -->
    {!! Html::script('assets/inc/bootstrap/js/bootstrap-timepicker.min.js') !!}

            <!-- flexslider -->
    {!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}


    <script type="text/javascript">
        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
        $(function () {
            $("#example1").DataTable();

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>



@endsection

