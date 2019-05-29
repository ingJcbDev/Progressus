$(document).ready(function () {

    cargarDatosTema();
    loadPreguntas();

    $("textarea[maxlength]").keyup(function () {
        var limit = $(this).attr("maxlength"); // Límite del textarea
        var value = $(this).val();             // Valor actual del textarea
        var current = value.length;              // Número de caracteres actual
        if (limit < current) {                   // Más del límite de caracteres?
            // Establece el valor del textarea al límite
            $(this).val(value.substring(0, limit));
        }
    });

    /*
     $(".upload").on('click', function () {
     var ruta = $("#ruta").val();
     var formData = new FormData();
     var files = $('#image')[0].files[0];
     formData.append('file', files);
     $.ajax({
     url: ruta + 'ajax/preguntas.php?op=upload',
     type: 'post',
     data: formData,
     contentType: false,
     processData: false,
     success: function (response) {
     if (response != 0) {
     $(".card-img-top").attr("src", response);
     } else {
     alert('Formato de imagen incorrecto.');
     }
     }
     });
     return false;
     });
     */

    $("#btnCerrar").click(function (event) {
        $("#registroPreguntas")[0].reset(); //limpiar form
    });


});

cargarDatosTema = function () {
    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var materia = $("#materia").val();
    var periodo = $("#periodo").val();
    var ruta = $("#ruta").val();
    var perfil = $("#perfil").val();

    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};

    $.ajax({
        type: "POST",
        url: ruta + 'ajax/preguntas.php?op=loadAll',
        dataType: "json",
        data: datos,
        success: function (data) {
            var array = data.data;
//            console.log(array);
//            alert(0);
            var titulo = 'Preguntas de la materia ( ' + array.materia + ' ) en el periodo ( ' + array.periodo + ' )';
            $("#titulo").html(titulo);

        },
        error: function (data) {
            alert('error');
        }
    });
}


insertarPreguntas = function () {

    var datos = $('#registroPreguntas').serialize();
    var ruta = $('#ruta').val();
    
    
//    var menu = $("#menuActivo").val();
//    var submenu1 = $("#subMenuActivo").val();
//    var materia = $("#materia").val();
//    var periodo = $("#periodo").val();
////    var ruta = $("#ruta").val();
////    var perfil = $("#perfil").val();
//
//    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};    

    var url = ruta + "ajax/preguntas.php?op=insert";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
            console.log(result);

            if (result.status == true) {
                alert(result.message);
                loadPreguntas();
                $("#preguntasModal").modal("hide");
//                cleanModal();
            } else {
                alert(result.message);
            }

        },
        error: function (data) {
            alert('error');
        }
    });

    return false;
}


loadPreguntas = function () {

    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var materia = $("#materia").val();
    var periodo = $("#periodo").val();
    var ruta = $("#ruta").val();
    var perfil = $("#perfil").val();

    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};
    var response = null;

    $("#preguntas_table").dataTable().fnDestroy();

    var url = ruta + "ajax/preguntas.php?op=loadData";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
            response = result.data;
            console.log(response);
            tabla = $('#preguntas_table').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sSearchPlaceholder": "Buscar...",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "order": [[0, "desc"]],
                data: response,
                "columns": [
//                    {"data": "materias_id"},
                    {"data": "materia"},
                    {"data": "periodo"},
                    {"data": "titulo_tema"},
                    {data: null, render: function (data, type, row) {
                            return  data.sw_estado === '1' ? '<i class="fa fa-toggle-on" style="font-size:20px;color:cornflowerblue" onclick=\"updateTema(' + data.temas_id + ', ' + data.sw_estado + ')\" title="Activo"></i>' : '<i class="fa fa-toggle-off" style="font-size:20px;color:darkgrey" onclick=\"updateTema(' + data.temas_id + ', ' + data.sw_estado + ')\" title="inactivo"></i>';
                        }, className: "center"
                    }
                ]
            });
        },
        error: function (response) {
            console.log(response);
            alert('error');
        }

    });
    updateTema = function (temas_id, sw_estado) {

        if (confirm("Seguro de actualizar el dato?")) {

            var ruta = $("#ruta").val();

            datos = {temas_id: temas_id, sw_estado: sw_estado};

            $.ajax({
                type: "POST",
                url: ruta + 'ajax/preguntas.php?op=updateTema',
                dataType: "json",
                data: datos,
                success: function (data) {
//                var array = data.data;
//                    console.log(data);
                    if (data.status == true) {
                        loadPreguntas();
                        alert('Datos actualizados satisfactoriamente');

                    } else {
                        alert('Error al actualizar los datos');
                    }

                },
                error: function (data) {
                    console.log(data);
                    alert('error');
                }
            });
        }
    }

};



recargarModal = function () {

    var ruta = $("#ruta").val();
    var c = $("#can").val();
    
    var iNum = parseInt($("#can").val());     

    


//Html = '<div id="preguntasModal" name="preguntasModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">\n\
//    <div class="modal-dialog modal-lg">\n\
//        <div class="modal-content">\n\
//            <div class="modal-header">\n\
//                <h5 class="modal-title" id="exampleModalLabel">Gestion de Preguntas</h5>\n\
//            </div>\n\
//            <div class="modal-body">\n\
//                <form id="registroPreguntas" name="registroPreguntas" method="POST" onsubmit="return insertarPreguntas();" autocomplete="off">\n\
//                    <div class="form-group">\n\
//                        <label for="temaTextarea"><b>Titulo:</b></label>\n\
//                        <input type="text" class="form-control" id="tituloTema" name="tituloTema" placeholder="Titulo" required>\n\
//                    </div>\n\
//                    <div class="form-group">\n\
//                        <label for="temaTextarea"><b>Tema:</b></label>\n\
//                        <textarea class="form-control" id="temaTextarea" name="temaTextarea" rows="5" maxlength="1000024" placeholder="Tema....................." required></textarea>\n\
//                    </div>\n\
//';
    
Html='';    
    
for (var i = 1; i < iNum; i++) {
        
Html += '       <div class="card w-100">\n\
                    <div class="card-body">\n\
                        <div class="form-group">\n\
                            <label for="pregunta1"><b>Pregunta ' + i + ':</b></label>\n\
                            <input type="text" class="form-control" id="pregunta_' + i + '" name="pregunta_' + i + '" placeholder="Pregunta ' + i + '" required>\n\
                        </div>\n\
                        <label for="pregunta1"><b>Respuestas ' + i + ':</b></label>\n\
                        <div class="card w-100">\n\
                            <div class="card-body">\n\
                                <div class="row">\n\
                                    <div class="col-sm-6">\n\
                                        <input type="text" class="form-control" id="respuesta_' + i + '_1" name="respuesta_' + i + '_1" placeholder="Respuesta 1" required>                                        \n\
                                        <div class="custom-control custom-radio custom-control-inline">\n\
                                            <input type="radio" id="radioRespuesta_' + i + '_1" name="radioRespuesta_' + i + '" value="radioRespuesta_' + i + '_1" class="custom-control-input" required>\n\
                                            <label class="custom-control-label" for="radioRespuesta_' + i + '_1"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="col-sm-6">\n\
                                        <input type="text" class="form-control" id="respuesta_' + i + '_2" name="respuesta_' + i + '_2" placeholder="Respuesta 2" required>                                        \n\
                                        <div class="custom-control custom-radio custom-control-inline">\n\
                                            <input type="radio" id="radioRespuesta_' + i + '_2" name="radioRespuesta_' + i + '" value="radioRespuesta_' + i + '_2" class="custom-control-input" required>\n\
                                            <label class="custom-control-label" for="radioRespuesta_' + i + '_2"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>   \n\
                                <br>\n\
                                <div class="row">\n\
                                    <div class="col-sm-6">\n\
                                        <input type="text" class="form-control" id="respuesta_' + i + '_3" name="respuesta_' + i + '_3" placeholder="Respuesta 3" required>                                        \n\
                                        <div class="custom-control custom-radio custom-control-inline">\n\
                                            <input type="radio" id="radioRespuesta_' + i + '_3" name="radioRespuesta_' + i + '" value="radioRespuesta_' + i + '_3" class="custom-control-input" required>\n\
                                            <label class="custom-control-label" for="radioRespuesta_' + i + '_3"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="col-sm-6">\n\
                                        <input type="text" class="form-control" id="respuesta_' + i + '_4" name="respuesta_' + i + '_4" placeholder="Respuesta 4" required>                                        \n\
                                        <div class="custom-control custom-radio custom-control-inline">\n\
                                            <input type="radio" id="radioRespuesta_' + i + '_4" name="radioRespuesta_' + i + '" value="radioRespuesta_' + i + '_4" class="custom-control-input" required>\n\
                                            <label class="custom-control-label" for="radioRespuesta_' + i + '_4"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
';
    
} 
    
//Html += '   </div>\n\
//            <div class="modal-footer">\n\
//                <button type="button" class="btn btn-secondary btnEstandar" id="btnCerrar" name="btnCerrar" data-dismiss="modal" onclick=""><i class="fa fa-times-circle-o" style="font-size:16px;"></i> Cerrar</button>\n\
//                <button type="submit" class="btn btn-primary btnEstandar" onclick=""><i class="fa fa-save" style="font-size:16px"></i> Guardar</button> \n\
//            </div>\n\
//            </form>\n\
//        </div>\n\
//    </div>\n\
//</div>\n\
//';

$("#modalPreguntas_").html(Html);

}