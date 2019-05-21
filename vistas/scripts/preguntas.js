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
        $("#registroPreguntas")[0].reset();
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
                    // <i class="fa fa-toggle-on" aria-hidden="true"></i>
//                    ,
//                    {data: null, render: function (data, type, row) {
//                            return  '<i class="fa fa-pencil-square-o fa-4 pointer" aria-hidden="true" style="font-size:18px;color:blue" onclick=\"datosUserEdit(' + data.idusuario + ')\" title="Modificar Usuario"></i>&nbsp; | &nbsp;\n\
//                        <i class="fa fa-trash-o fa-lg" style="font-size:18px;color:red" onclick=\"deleteUser(' + data.idusuario + ')\" title="Eliminar Usuario"></i>';
//                        }, className: "center"
//                    }
                ]
            });
        },
        error: function (response) {
            console.log(response);
            alert('error');
        }

    });
    updateTema = function (temas_id, sw_estado) {

//        if (confirm("Seguro de eliminar el dato?")) {
//            alert("se elimino correctamente");
//        } else {
//            alert("cancelo la solicitud");
//        }

//        alert(temas_id + ' - ' + sw_estado);

//        var menu = $("#menuActivo").val();
//        var submenu1 = $("#subMenuActivo").val();
//        var materia = $("#materia").val();
//        var periodo = $("#periodo").val();
//        var perfil = $("#perfil").val();




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