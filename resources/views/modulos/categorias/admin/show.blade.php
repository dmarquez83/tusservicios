@extends('layout.app')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-10 col-md-offset-1">
			<div class="box box-solid">
				<div class="box-header with-border">
					<a class="btn btn-sm bg-orange pull-right" href="{{ route('categorias.index') }}">
						<i class="fa fa-list-alt"></i> Todas Categorias
					</a>
					<h3 class="box-title">{{ $categoria->nombre }}</h3>
				</div>
				<div class="box-body">
					<label>Descripción</label>
					<p>{{ $categoria->descripcion }}</p>
					<div class="text-center margin">
						{!! Html::image('assets/img/categorias-img/'.$categoria->foto, '', array('class' => 'responsive-img thumbnail img-300-200')) !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
