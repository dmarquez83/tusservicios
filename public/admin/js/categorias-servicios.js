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

    $(document).on('change','.ciudad',function(){


      /*  var listaCiudades= new Array();

        listaCiudades.push(parseInt($(this).val())) ;

        alert($(this).val());*/

        $.get($(this).data('path'),
            { option: $(this).val() },
            function(data) {
                //console.log(data);
                $.each(data, function(key, element) {
                    //console.log(element.nombre);
                    $('.sectores').append("<div class='checkbox'><label><input name='sectores[" + element.id +  "]' type='checkbox' value='" + element.id +  "'>" + element.nombre + "</label></div>");
                });
            });



    });
});