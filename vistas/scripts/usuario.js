var tabla;

$(document).ready(function () {


    $(".valEmail").keypress(function (key) {
//        window.console.log(key.charCode) //para ver el codigo de la letra
        if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 64) //@
                && (key.charCode != 95) //_
                && (key.charCode != 46) //.
                && (key.charCode != 0) //borrar
                && (key.charCode < 47 || key.charCode > 57) //numeros
                )
            return false;
    });

    callAllUser();
    cargarDatosForm();

});

prueba = function () {
//    alert(1);

//  var bool=confirm("Seguro de eliminar el dato?");
    if (confirm("Seguro de eliminar el dato?")) {
        alert("se elimino correctamente");
    } else {
        alert("cancelo la solicitud");
    }

}


callAllUser = function () {

    var response = null;
    $("#user_data").dataTable().fnDestroy();

    $.ajax({
        type: "POST",
        url: '../ajax/usuario.php?op=listar',
        async: false,
        success: function (result) {
            response = JSON.parse(result).data;
        }
    });

    //console.log("res-> \n");
    //console.log(response);

    tabla = $('#user_data').DataTable({
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
            {"data": "idusuario"},
            {"data": "nombre"},
            {"data": "tipo_documento"},
            {"data": "direccion"},
            {"data": "telefono"},
            {"data": "email"},
            {"data": "login"},
            {data: null, render: function (data, type, row) {
                    return  data.condicion === '1' ? '<i class="fa fa-user-circle" style="font-size:18px;color:green" title="Activo"></i>' : '<i class="fa fa-user-circle-o" style="font-size:18px;color:red" title="inactivo"></i>';
                }, className: "center"
            },
            {data: null, render: function (data, type, row) {
                    return  '<i class="fa fa-pencil-square-o fa-4 pointer" aria-hidden="true" style="font-size:18px;color:blue" onclick=\"datosUserEdit(' + data.idusuario + ')\" title="Modificar Usuario"></i>&nbsp; | &nbsp;\n\
                        <i class="fa fa-trash-o fa-lg" style="font-size:18px;color:red" onclick=\"deleteUser(' + data.idusuario + ')\" title="Eliminar Usuario"></i>';
                }, className: "center"
            }
        ]
    });

};
//<i class="fa fa-trash-o fa-lg"></i>
activarInativar = function (idusuario) {
    alert(idusuario);
    //tabla.ajax.reload();
    //location.reload();
}

bloquearModal = function () {
    $("#userModal").modal({backdrop: "static", keyboard: false})
    $("#userModal").modal("show");
}

registrarUsuario = function () {

    var datos = $('#registroUsuario').serialize();
    var ruta = $('#ruta').val();
    var clave = $('#clave').val();
    var clave1 = $('#clave1').val();

    if (clave != clave1) {
        alert("La contraseña no coinciden");
        return false;
    }

    var url = "../ajax/usuario.php?op=insert";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
            // console.log(result);

//                if(result.status==false){
//                }
            if (result.status == true) {
                alert(result.message);
//                window.location.href = ruta;
                callAllUser();
//                $("#userModal .close").click();
                $("#userModal").modal("hide");
                cleanModal();
//                    $("#user_data").dataTable().fnDestroy();
            } else {
                alert(result.message);
            }

        }
    });

    return false;
}

cleanModal = function () {

    $('#tipo_documento').val("");
    $('#idusuario').val("");
    $('#num_documento').val("");
    $('#nombre').val("");
    $('#direccion').val("");
    $('#telefono').val("");
    $('#telefono').val("");
    $('#email').val("");
    $('#cargo').val("");
    $('#login').val("");
    $('#clave').val("");
    $('#clave1').val("");
    $("#tipo_documento").prop('disabled', false);
    $("#num_documento").prop('disabled', false);
    $("#email").prop('disabled', false);
    $("#login").prop('disabled', false);

    return true;
}

deleteUser = function (idusuario) {
//    var ruta = $('#ruta').val();

    if (confirm("Seguro de eliminar el dato?")) {

        var url = "../ajax/usuario.php?op=delete";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {idusuario: idusuario},
            success: function (result)
            {
                // console.log(result);

//                if(result.status==false){
//                }
                if (result.status == true) {
                    alert(result.message);
//                    window.location.href = ruta; 
                    $("#user_data").dataTable().fnDestroy();
                    callAllUser();
                } else {
                    alert(result.message);
                }

            }
        });

    }
}

datosUserEdit = function (idusuario) {
//    var ruta = $('#ruta').val();

    if (confirm("Seguro de editar el dato?")) {

        var url = "../ajax/usuario.php?op=update";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {idusuario: idusuario},
            success: function (result)
            {
//                console.log(result);


//                console.log(result.data.idusuario);

                bloquearModal();
//            $("#userModal").modal();

                $("#tipo_documento").prop('disabled', true);
                $("#num_documento").prop('disabled', true);
                $("#email").prop('disabled', true);
                $("#login").prop('disabled', true);

                $('#idusuario').val(result.data.idusuario);
                $('#tipo_documento').val(result.data.tipo_documento);
                $('#num_documento').val(result.data.num_documento);
                $('#nombre').val(result.data.nombre);
                $('#direccion').val(result.data.direccion);
                $('#telefono').val(result.data.telefono);
                $('#telefono').val(result.data.telefono);
                $('#email').val(result.data.email);
                $('#cargo').val(result.data.cargo);
                $('#login').val(result.data.login);
                $('#clave').val(result.data.clave);
                $('#clave1').val(result.data.clave);
                $('#condicion').val(result.data.condicion);

//                if(result.status==false){
//                }
//                if(result.status==true){
//                    alert(result.message);
////                    window.location.href = ruta; 
//                    $("#user_data").dataTable().fnDestroy();
//                    callAllUser();
//                }else{
//                    alert(result.message);
//                }

            }
        });

    }

}

cargarDatosForm = function () {
    $.ajax({
        type: "POST",
        url: '../ajax/usuario.php?op=selectCargo',
        dataType: "json",
        success: function (data) {
            var array = data.data;

            Html = '<select id="perfil" name="perfil" class="form-control" required>';
            Html += '<option selected value="">--Seleccionar--</option>';
            $.each(array, function (key, registro) {
                Html += '<option value=' + registro.perfil_id + '>' + registro.descripcion + '</option>';
            });
            Html += '</select>';

            $("#selectCargo").html(Html);
        },
        error: function (data) {
            alert('error');
        }
    });
}
