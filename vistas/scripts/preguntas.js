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
    
    $(".upload").on('click', function() {
        var ruta = $("#ruta").val();
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: ruta + 'ajax/preguntas.php?op=upload',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
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






/*
menuSubmenu = function (obj) {

    var Id = obj.id;
    var result = Id.split('_');
    menu = result[1];
    submenu = result[2];
    materia = result[3];
    periodo = result[4];
    menuActivo(menu, submenu, materia, periodo);

//    console.log(result);
//    alert('ddddddddddddX');


}

menuActivo = function (menu, submenu, materia, periodo) {
//    alert(materia);
    var datos = {menu: menu, submenu: submenu, materia: materia, periodo: periodo};
    var rutaLogin = $('#rutaHeader').val();

//    console.log(rutaLogin);
//    alert(222222);

    var url = rutaLogin + "ajax/login.php?op=menuActivo";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
//            alert(5);
//            return false;
        }
    });

    return false;
}
*/