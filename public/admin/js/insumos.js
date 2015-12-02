$(document).ready(function(){

    $(".btn-listado-insumos").on('click', function(e){
        e.preventDefault();

        //btn-detalle-insumos no ejecutes la funcionalidad que tienes predeterminada ese enlace

        //obtemos todos los datos de la variable data que viene del index

        //this hace referencia al enlace que le estamos dando clic

        var id_servicio = $(this).data('id');
        var nombre = $(this).data('name');
        var path = $(this).data('path');
        var path_img = $(this).data('img');
        var token = $(this).data('token');
        var modal_title = $(".modal-title"); // modal-title viene del h4 de la vista modal-detalle-insumos
        var modal_body = $(".modal-body"); //modal-body lo obtenemos para luego escribir alguna informacion para escribir
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-listado-insumos tbody"); //es la tabla que dibuja la vista del modal
        //obtenemos acceso al tbody que es donde se va a escribir la informacion
        var data = {'_token' : token, 'id_servicio' : id_servicio};

        modal_title.html('Insumos para: ' + nombre); // le concatenamos al titulo el numero de servicio
        table.html(loading); //mostramos el icono con el texto cargando datos

        $.post(
            path,
            data,
            function(data){
                //console.log(response); //para ver la respuesta del serve en console
                table.html("");

                for(var i=0; i<data.length; i++){

                    var fila = "<tr>";
                    fila += "<td><img src="+ path_img + "/" + data[i].foto  + " width='30'></td>";
                    fila += "<td>" + data[i].referencia + "</td>";
                    fila += "<td>" + data[i].descripcion + "</td>";
                    fila += "</tr>";

                    table.append(fila);
                }

            },
            'json'
        );

    });


});