$(function(){
    var editTipo = $('.edit-tipo');
    var modalEditTipo = $('#modal-edit-tipo');
    var formEditTipo = $('#form-edit-tipo');
    editTipo.click(function(){
        var url = formEditTipo.attr('action')+$(this).data('tipo');
        formEditTipo.attr('action',url);
        modalEditTipo.modal('show');

    });


    $('#boton-env').click(function(){

        var url = formEditTipo.attr('action');
        console.log(url);

    });

});