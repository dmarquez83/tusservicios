$(document).ready(function(){
    $('#id_categoria').change(function(){
        $.get("{{ url('dropdown')}}",
            { option: $(this).val() },
            function(data) {
                $('#tiposervicio_id').empty();
                $.each(data, function(key, element) {
                    $('#tiposervicio_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            });
    });
});