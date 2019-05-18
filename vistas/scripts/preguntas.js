$(document).ready(function () {

    cargarDatosTema();

    $("textarea[maxlength]").keyup(function () {
        var limit = $(this).attr("maxlength"); // Límite del textarea
        var value = $(this).val();             // Valor actual del textarea
        var current = value.length;              // Número de caracteres actual
        if (limit < current) {                   // Más del límite de caracteres?
            // Establece el valor del textarea al límite
            $(this).val(value.substring(0, limit));
        }
    });

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
    
//    alert(8888);
    
    var datos = $('#registroPreguntas').serialize();
    var ruta = $('#ruta').val();
    
    console.log(ruta);
    console.log('------------------->');
    console.log(datos);

    var url = ruta+"ajax/preguntas.php?op=insert";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
             console.log(result);

//                if(result.status==false){
//                }
//            if (result.status == true) {
//                alert(result.message);
////                window.location.href = ruta;
//                callAllUser();
////                $("#userModal .close").click();
//                $("#userModal").modal("hide");
//                cleanModal();
////                    $("#user_data").dataTable().fnDestroy();
//            } else {
//                alert(result.message);
//            }

        }
    });
    
    
/*

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
 */    
    
    
    return false;
}