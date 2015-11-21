@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">
            @if($insumos->isEmpty())
                <div class="well text-center">Insumos no encontrada.</div>
            @else
                @include('insumos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $insumos])

    </div>
@endsection

