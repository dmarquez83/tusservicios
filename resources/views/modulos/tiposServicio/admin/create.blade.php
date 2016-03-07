<div class="modal fade" id="modal-add-tipo" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Tipo de Servicio</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['admin.tiposServicio.store'], 'method' => 'POST','id' => 'form-add-tipo']) !!}
                <input type="hidden" name="categoria_id" value="{{ $categoria->id }}">
                <div class="margin-bottom">
                    <label>Tipo Servicio:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-font"></i>
                        </span>
                        <input type="text" class="form-control" id="tipo-name-new" name="tipo-name-new" placeholder="Tipo Servicio" required/>
                    </div>
                </div>
                <div class="margin-bottom">
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea placeholder="Descripción" rows="3" class="form-control" id="tipo-descripcion-new" name="tipo-descripcion-new" required></textarea>
                    </div>
                </div>
                <div class="margin-bottom text-right">
                    <button type="submit" class="btn bg-navy btn-sm" id="btn-update">
                        <i class="fa fa-save"></i> Agregar
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>