@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')
            {!! Form::model($sector, ['route' => ['admin.sectores.update', $sector->id], 'method' => 'patch']) !!}

                @include('sectors.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
