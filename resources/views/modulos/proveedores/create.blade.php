@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')
            {!! Form::open(['route' => 'admin.proveedores.store', 'method' => 'POST', 'files' => 'true', 'id' => 'myForm']) !!}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-header">Crear Proveedor</h2>
            </div>
                @include('modulos.proveedores.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts-modulo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    {!! Html::script('assets/js/app/usuarios-insumos.js') !!}
    {!! Html::script('assets/js/app/insumos-proveedores.js') !!}

    {{--
    {!! Html::script('assets/inc/bootstrap/js/jquery.dataTables.min.js') !!}

    {!! Html::script('assets/inc/bootstrap/js/dataTables.bootstrap.min.js') !!}
           <!-- flexslider -->
    {!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}
    --}}

@endsection



