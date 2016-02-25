$(document).ready(function(){

    $.get($(ruta).val(),
        { option: $(this).val() },
        function(data) {
            $('#lugares').empty();
            $.each(data, function(key, element) {
                $('#lugares').append(element.nombre + ", ");
            });
        });

    $.get($(ruta_horario).val(),
        { option: $(this).val() },
        function(data) {
            $('#horario').empty();
            $.each(data, function(key, element) {
                $('#horario').append(" " + element.dia + ": " + element.hora + ", <br>");
            });
        });

});