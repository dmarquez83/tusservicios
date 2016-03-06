@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<a class="btn btn-sm bg-navy pull-right margin" href="{{ route('admin.servicios.edit',$servicio->id) }}">
						<i class="fa fa-edit"></i> Editar Servicio
					</a>
					<a class="btn btn-sm bg-orange-active pull-right margin" href="{{ route('admin.categorias.index') }}">
						<i class="fa fa-list-alt"></i> Lista de Servicios
					</a>
					<h4 class="margin">{{ $servicio->nombre }}</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label>Nombre:</label>
							<p>{{ $servicio->nombre }}</p>
							<label>Descripción:</label>
							<p>{{ $servicio->descripcion }}</p>
							<label>Ponderación:</label>
							<p>{{ $servicio->ponderacion }}</p>
							<label>Descripción:</label>
							<p>{{ $servicio->descripcion }}</p>

						</div>
						<div class="col-xs-12 col-md-6">
							<div class="text-center margin">
								{!! Html::image('assets/img/servicios-img/'.$servicio->foto, '', array('class' => 'responsive-img thumbnail img-300-200')) !!}
							</div>
						</div>
					</div>
					<hr>
					<div class="box-header">
						<h3 class="box-title">Proveedores de Servicio</h3>
					</div>
					<div class="list-group">
							<div class="list-group-item">
								<span class="badge bg-green">14</span>
								<h5 class="list-group-item-heading">{{ $servicio->nombre }}</h5>
								<p class="list-group-item-text margin-bottom">{{ $servicio->descripcion }}</p>
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

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection