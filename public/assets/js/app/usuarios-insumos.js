$(document).ready(function(){

  /*  $('[data-toggle="tooltip"]').tooltip();*/

  /*  $("#example1").DataTable();*/



    $(document).on('change','.insumo',function(){

        var tabla = $("#tabla-listado-insumos tbody");

        var listaInsumos = new Array();

        listaInsumos.push(parseInt($(this).val())) ;

        var nombre = $('#fil' + listaInsumos + ' td')[1].innerHTML;

        var descripcion = $('#fil' + listaInsumos + ' td')[2].innerHTML;

        var input =   "<input type='hidden'  name='insumo["+  listaInsumos +  "]' value='" + listaInsumos + "'></input>";


       /* $('.insumos').append("<div class='checkbox'><label><input name='sectores' type='checkbox' value='" + 'valor' +  "'>" + nombre + "</label></div>");*/

        var  fila = "<tr>";

         fila += "<td>" +  nombre + input + "</td>";
         fila += "<td>" + descripcion + "</td>";
         fila += "<td style='width: 10%'><div class='col-sm-6 border-right'><a class='btn btn-primary' href='#' role='button' data-toggle='Eliminar'><i class='glyphicon glyphicon-remove'></i></a></div></td>";
         fila += "</tr>";

       //  console.log(tabla);

         tabla.append(fila);

         $('#tabla-listado-insumos').DataTable();



    });

});

