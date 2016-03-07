/**
 * Created by oscar on 25/02/16.
 */

$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#servicios-list').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "order": [[ 0, "asc" ]],
        "info": true,
        "autoWidth": true
    });

    $('.categoria-delete').deleteRegistro();
});
//# sourceMappingURL=categorias_index.js.map