$(document).ready(function(){

    $(".btn-listado-insumos").on('click', function(e){
        e.preventDefault();

        //btn-detalle-pedido no ejecutes la funcionalidad que tienes predeterminada ese enlace

        //obtemos todos los datos de la variable data que viene del index

        //this hace referencia al enlace que le estamos dando clic

        var id_servicio = $(this).data('id');
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title"); // modal-title viene del h4 de la vista modal-detalle-pedido
        var modal_body = $(".modal-body"); //modal-body lo obtenemos para luego escribir alguna informacion para escribir
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-listado-insumos tbody"); //es la tabla que dibuja la vista del modal
        //obtenemos acceso al tbody que es donde se va a escribir la informacion
        var data = {'_token' : token, 'order_id' : id_servicio};

        modal_title.html('Listado de insumos: ' + id_servicio); // le concatenamos al titulo
        table.html(loading); //mostramos el icono con el texto cargando datos



    });


});