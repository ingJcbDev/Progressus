$(document).ready(function () {
    
});

prueba = function(){
    alert(1);
}

datosUserEdit = function (idusuario) {
//    var ruta = $('#ruta').val();
    var url = "../ajax/usuario.php?op=update";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: {idusuario: idusuario},
        success: function (result)
        {
            console.log(result);
            
        }
    });
}