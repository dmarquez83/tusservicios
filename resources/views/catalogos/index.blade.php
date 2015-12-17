@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Catalogos</h1>

        </div>

        <div class="row">
            @if($catalogos->isEmpty())
                <div class="well text-center">No Catalogos found.</div>
            @else
                @include('catalogos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $catalogos])


    </div>
@endsection