$(document).ready(function(){

    $.get($(ruta).val(),
        { option: $(this).val() },
        function(data) {
            $('#tiposervicio_id').empty();
            $.each(data, function(key, element) {
                //console.log(element.nombre);

                $('#lugares').append(element.nombre + ", ");
            });
        });

});