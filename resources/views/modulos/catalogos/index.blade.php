@extends('layout.app')

@section('content')

    <div>

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Catalogos</h1>

        </div>

        <div class="row">
            @if($catalogos->isEmpty())
                <div class="well text-center">No Catalogos found.</div>
            @else
                @include('modulos.catalogos.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $catalogos])


    </div>
@endsection