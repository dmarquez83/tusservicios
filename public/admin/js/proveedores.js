$(document).ready(function(){


    $(".btn-listado-proveedores").on('click', function(e){
        e.preventDefault();

        var id_insumo = $(this).data('id');
        var nombre = $(this).data('name');
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-listado-proveedores tbody");
        var data = {'_token' : token, 'id_insumo' : id_insumo};

        modal_title.html('Proveedores para: ' + nombre);
        table.html(loading);

        $.post(
            path,
            data,
            function(data){
                //console.log(response);
                table.html("");

                for(var i=0; i<data.length; i++){

                    var fila = "<tr class='fil" +  data[i].id + "' >";
                    fila += "<td><input id = " + id_insumo + " class='boton_check' type='checkbox' name='" + "proveedor[" + i + "]" + "' value='" + data[i].id + "'></td>";
                    fila += "<td class='nombre" + data[i].id + "'>" + data[i].nombre + "</td>";
                    fila += "<td class='telefono" + data[i].id + "'>" + data[i].telefono + "</td>";
                    fila += "<td class='correo" + data[i].id + "'>" + data[i].correo + "</td>";
                    fila += "</tr>";

                    table.append(fila);
                }

            },
            'json'
        );

    });


    $(document).on('change','.boton_check',function(){

        var listaProveedores = new Array();

        var idlistaProveedores = new Array();

        var row;

        var repetido = 1;

        var x;

        var filaid;


        if($(this).prop('checked')){

            listaProveedores.push(parseInt($(this).val())) ;

            idlistaProveedores.push(parseInt($(this).attr("id"))) ; //con esto tomo el id del insumo que se lo di al input del check para crear un tabla por cada insumo
           // console.log(idlistaProveedores);



          /* $('input[name^="proveedor_id"]').each(function() {         //esto es para validar que no se repita el mismo proveedor el problema es con las tablas

                //alert($(this).val());

                if(listaProveedores != $(this).val()){

                   repetido = 1;

                }else{

                   alert('Este Proveedor ya se encuentra en la Lista');

                   x = 2;

                    $("input:checkbox").prop('checked', false);



                }
           });*/



            if(repetido == 1 && x != 2){

                var tabla = $("#tabla-listado-proveedores" + idlistaProveedores + " tbody");


                var  fila = "<tr " + "id=fila" + listaProveedores + ">";

                fila += "<td>" +  $(".fil" + listaProveedores + " td")[1].innerHTML + "</td>";
                fila += "<td>" +
                     "<input type='text'  name='precio" + idlistaProveedores +  listaProveedores +  "' value=''></input></td>" +
                     "<input type='hidden'  name='proveedor_id" + idlistaProveedores + "["+  listaProveedores +  "]' value='" + listaProveedores + "'></input></td>";
                fila += "<td>" +  "<input type=file  name='foto" + idlistaProveedores + "["+  listaProveedores +  "]'>" + "</td>";
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
