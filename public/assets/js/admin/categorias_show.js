$(function(){
    var editTipo = $('.edit-tipo');
    var modalEditTipo = $('#modal-edit-tipo');
    var titleEditTipo = $('#title-edit-tipo');
    var formEditTipo = $('#form-edit-tipo');
    var tipoName = $('#tipo-name');
    var tipoDescripcion = $('#tipo-descripcion');
    var btnUpdate = $('#btn-update');
    var action = formEditTipo.attr('action');

    editTipo.click(function(){
        var url = action.replace('&ID',$(this).data('tipo'));
        formEditTipo.attr('action',url);
        titleEditTipo.text($(this).data('name'));
        tipoName.val($(this).data('name'));
        tipoDescripcion.val($(this).data('descrip'));
        modalEditTipo.modal('show');
    });

    $('.delete-tipo').deleteRegistro();

    var addTipo = $('#add-tipo');
    var modalAddTipo = $('#modal-add-tipo');


    addTipo.click(function(){
        modalAddTipo.modal('show');
    });

});
//# sourceMappingURL=categorias_show.js.map
