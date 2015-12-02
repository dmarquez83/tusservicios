<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Listado de insumos: </h4>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-stripped table-bordered table-hover" id="table-listado-insumos">
                        <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Foto</th>
                            <th>Referencia</th>
                            <th>descripcion</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                <a
                        href="#"
                        class="btn btn-primary btn-guardar-insumos"
                        data-path="{{ route('insumoSolicitudes.getGuardar') }}"
                        data-token="{{ csrf_token() }}"
                        >
                    <i class="fa fa-external-link">Agregar</i>
                </a>
            </div>

        </div>
    </div>
</div>
