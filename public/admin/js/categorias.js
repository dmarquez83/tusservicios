$(document).ready(function(){
    $('#id_categoria').change(function(){
        $.get($(this).data('path'),
            { option: $(this).val() },
            function(data) {
                $('#tiposervicio_id').empty();
                $.each(data, function(key, element) {
                    //console.log(element.nombre);
                    $('#tiposervicio_id').append("<option value='" + element.id + "'>" + element.nombre + "</option>");
                });
            });
    });
});