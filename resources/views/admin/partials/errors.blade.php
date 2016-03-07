<div class="row">
	<div class="col-xs-12">
		@if (Session::has('errors'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Han ocurrido estos errores:</strong>
				<ul class="" style="list-style: none">
					@foreach ($errors->all() as $error)
						<li class="list-item">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (Session::has('status'))
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul>
					<strong>{{ trans('notifications.alert') }}</strong>
					<li>{{ Session::get('status') }}</li>
				</ul>
			</div>
		@endif
	</div>
</div>