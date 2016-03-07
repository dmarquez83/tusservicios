@if(session()->has('error'))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-warning"></i>
            {{ session()->get('error') }}
        </div>
    </div>
</div>
@endif
