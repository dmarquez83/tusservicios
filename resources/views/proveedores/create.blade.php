@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')
            {!! Form::open(['route' => 'admin.proveedores.store', 'method' => 'POST', 'files' => 'true']) !!}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-header">Crear Proveedor</h2>
            </div>
                @include('proveedores.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts-modulo')


{!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}
{!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
        <!-- flexslider -->
{!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}

{!! Html::script('admin/js/usuarios-insumos.js') !!}

@endsection



