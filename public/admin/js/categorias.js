$(document).ready(function(){
    $('#id_categoria').change(function(){
        $.get("http://localhost:8000/categorias/desplegable",
            { option: $(this).val() },
            function(data) {
                $('#tiposervicio_id').empty();
                $.each(data, function(key, element) {
                    //console.log(element.nombre);
                    $('#tiposervicio_id').append("<option value='" + key + "'>" + element.nombre + "</option>");
                });
            });
    });
});