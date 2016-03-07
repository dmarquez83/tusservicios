@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $categoria->nombre }}</h3>
					<a class="btn btn-sm bg-navy pull-right margin-left" href="{{ route('admin.categorias.edit',$categoria->id) }}">
						<i class="fa fa-edit"></i> Editar Categoria
					</a>
					<a class="btn btn-sm bg-orange-active pull-right margin-left" href="{{ route('admin.categorias.index') }}">
						<i class="fa fa-list-alt"></i> Lista de Categorias
					</a>
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
								{!! Html::image('assets/img/categorias-img/'.$categoria->foto, '', array('class' => 'img-300-200 img-bordered')) !!}
							</div>
						</div>
					</div>
					<hr>
					<div class="box-header">
						<h3 class="box-title">Tipos de Servicio</h3>
						<div class="pull-right">
							<button class="btn btn-sm bg-navy" id="add-tipo">
								<i class="fa fa-plus-circle"></i> Agregar Tipo Servicio
							</button>
						</div>
					</div>

					<div class="list-group">
						@foreach($categoria->tiposServicio AS $tipo)
							<div class="list-group-item">
								<span class="badge bg-green">{{ count($tipo->servicios) }}</span>
								<h4 class="list-group-item-heading">{{ $tipo->nombre }}</h4>
								<p class="list-group-item-text margin-bottom">{{ $tipo->descripcion }}</p>
								<div class="text-left">
									<a href="{{ route('admin.tiposServicio.servicios',$tipo->id) }}" class="btn btn-sm bg-orange-active" >
										<i class="fa fa-list"></i> Lista de Servicios
									</a>
									<button class="btn btn-sm bg-navy edit-tipo" data-tipo="{{ $tipo->id }}" data-name="{{ $tipo->nombre }}" data-descrip="{{ $tipo->descripcion }}">
										<i class="fa fa-edit"></i> Editar
									</button>
									<a class="btn btn-sm btn-danger delete-tipo" href="{{ route('admin.tiposServicio.delete',$tipo->id) }}"
										data-title="{{ $tipo->nombre }}">
										<i class="fa fa-remove"></i> Eliminar
									</a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('modulos.tiposServicio.admin.edit')
	@include('modulos.tiposServicio.admin.create')
	@include('admin.modals.confirm-delete')

@endsection

@section('scripts')
	{!! Html::script('assets/js/admin/modal_delete.js') !!}
	{!! Html::script('assets/js/admin/categorias_show.js') !!}
@endsection