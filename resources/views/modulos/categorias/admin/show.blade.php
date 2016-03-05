@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<a class="btn btn-sm bg-navy pull-right margin" href="{{ route('admin.categorias.edit',$categoria->id) }}">
						<i class="fa fa-edit"></i> Editar Categoria
					</a>
					<a class="btn btn-sm bg-orange-active pull-right margin" href="{{ route('admin.categorias.index') }}">
						<i class="fa fa-list-alt"></i> Todas Categorias
					</a>
					<h3 class="margin">{{ $categoria->nombre }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label>Nombre:</label>
							<p>{{ $categoria->nombre }}</p>
							<label>Descripción:</label>
							<p>{{ $categoria->descripcion }}</p>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="text-center margin">
								{!! Html::image('assets/img/categorias-img/'.$categoria->foto, '', array('class' => 'responsive-img thumbnail img-300-200')) !!}
							</div>
						</div>
					</div>
					<hr>
					<div class="box-header">
						<h3 class="box-title">Tipos de Servicio</h3>
					</div>

					<div class="list-group">
						@foreach($categoria->tiposServicio AS $tipo)
							<div class="list-group-item">
								<span class="badge bg-green">14</span>
								<h5 class="list-group-item-heading">{{ $tipo->nombre }}</h5>
								<p class="list-group-item-text margin-bottom">{{ $tipo->descripcion }}</p>
								<div class="text-left">
									<button class="btn btn-sm bg-orange-active" >
										<i class="fa fa-list"></i> Lista de Servicios
									</button>
									<button class="btn btn-sm bg-navy" >
										<i class="fa fa-edit"></i> Editar
									</button>
									<button class="btn btn-sm btn-danger">
										<i class="fa fa-remove"></i> Eliminar
									</button>
								</div>
							</div>
						@endforeach
					</div>


				</div>
			</div>
		</div>
	</div>
@endsection
