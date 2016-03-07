<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar - <span id="title-delete"></span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'DELETE','id' => 'form-delete']) !!}
                <div class="alert bg-light-blue">
                    <i class="fa fa-info-circle"></i> Eliminar Registro <span id="msj-delete"></span>
                </div>

                <div class="margin-bottom text-right">
                    <button type="submit" class="btn bg-navy btn-sm" id="btn-update">
                        <i class="fa fa-remove"></i> Eliminar
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>