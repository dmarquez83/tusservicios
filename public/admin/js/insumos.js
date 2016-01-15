$(document).ready(function(){


    $(".btn-listado-insumos").on('click', function(e){
        e.preventDefault();

        var id_servicio = $(this).data('id');
        var nombre = $(this).data('name');
        var path = $(this).data('path');
        var path_img = $(this).data('img');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-listado-insumos tbody");
        var data = {'_token' : token, 'id_servicio' : id_servicio};

        modal_title.html('Insumos para: ' + nombre);
        table.html(loading);

        $.post(
            path,
            data,
            function(data){
                //console.log(response);
                table.html("");

                for(var i=0; i<data.length; i++){

                    var fila = "<tr class='fil" +  data[i].id + "' >";
                    fila += "<td><input class='boton_check' type='checkbox' name='" + "insumo[" + i + "]" + "' value='" + data[i].id + "'></td>";
                    fila += "<td><img src="+ path_img + "/" + data[i].foto  + " width='30'></td>";
                    fila += "<td class='ref" + data[i].id + "'>" + data[i].referencia + "</td>";
                    fila += "<td class='des" + data[i].id + "'>" + data[i].descripcion + "</td>";
                    fila += "</tr>";

                    table.append(fila);
                }

            },
            'json'
        );

    });


    $(document).on('change','.boton_check',function(){

        var listaInsumos = new Array();

        var tabla = $("#tabla-listado-insumos tbody");

        var row;

        var repetido = 1;

        var x;

        var filaid;


        if($(this).prop('checked')){

            listaInsumos.push(parseInt($(this).val())) ;


           $('input[name^="insumoh"]').each(function() {

                //alert($(this).val());

                if(listaInsumos != $(this).val()){

                   repetido = 1;

                }else{

                   alert('Este insumo ya se encuentra en la Lista');

                   x = 2;

                    $("input:checkbox").prop('checked', false);



                }
           });



            if(repetido == 1 && x != 2){

                var  fila = "<tr " + "id=fila" + listaInsumos + ">";

                fila += "<td>" +  $(".fil" + listaInsumos + " td")[0].innerHTML + "</td>";
                fila += "<td>" +  $(".fil" + listaInsumos + " td")[2].innerHTML +
                     "<input type='hidden' class='insumos' name='insumoh["+  listaInsumos +  "]' value='" + listaInsumos + "'></input></td>";
                fila += "<td>" +  $(".fil" + listaInsumos + " td")[3].innerHTML + "</td>";
                fila += "<td>" +  "<button class='delete'>Borrar</button>" +  "</td>";
                fila += "</tr>";
                tabla.append(fila);

                repetido = 0;
            }

        }
        else{ //con el modal abierto cuando deselecciona se quita la fila

            filaid = "fila" + $(this).val();

            row = document.getElementById(filaid);

            while (row.hasChildNodes()) {
                row.removeChild(row.firstChild);
            }

        }



        $(".delete").click(function(event) {
            // $("p").remove();
            $(this).parents('tr').remove();
        });


        //console.log( );
    });




});
