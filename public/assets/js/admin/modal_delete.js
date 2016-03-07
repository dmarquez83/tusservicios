(function ($) {
    $.fn.extend({
        deleteRegistro: function () {
            $(this).click(function(e){
                e.preventDefault();
                var formDelete = $('#form-delete');
                var msjDelete = $('#msj-delete');
                var titleDelete = $('#title-delete');

                formDelete.attr('action',$(this).attr('href'));
                msjDelete.text($(this).data('title'));
                titleDelete.text($(this).data('title'));
                $('#modal-delete').modal('show');
            });
        }
    });

})(jQuery);




//# sourceMappingURL=modal_delete.js.map
