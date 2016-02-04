$(document).ready(function(){
    $('#id_categoria').change(function(){
        $.get($(this).data('path'),
            { option: $(this).val() },
            function(data) {
                $('#servicio_id').empty();
                $.each(data, function(key, element) {
                    //console.log(element.nombre);
                    $('#servicio_id').append("<option value='" + element.id + "'>" + element.nombre + "</option>");
                });
            });
    });

    /*$(document).on('change','.ciudad',function(){*/
    $('.ciudad').change(function(){

        if($(this).prop('checked')) {

            $.get($(this).data('path'),
                {option: $(this).val()},
                function (data) {
                    //console.log(data.length,'este');
                    $.each(data, function (key, element) {
                        //console.log(element.nombre);
                        $('.sectores').append("<div class='col-md-3'><div class='form-group'><div class='checkbox'><label><input name='sectores[" + element.id + "]' type='checkbox' value='" + element.id + "'>" + element.nombre + "</label></div></div></div>");

                    });
                });

        }else{
            /*falta eliminar la fila si la deselecciona de ciudad*/
        }

    });
});