@if(session()->has('message'))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i>
            {{ session()->get('message') }}
        </div>
    </div>
</div>
@endif
