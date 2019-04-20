$(document).ready(function () {

});


bloquearModalMostar = function () {
    $("#loginModal").modal({backdrop: "static", keyboard: false})
    $("#loginModal").modal("show");
}


prueba1 = function () {
    alert(1);
}

clearLogin = function () {
    $('#login0').val("");
    $('#clave0').val("");
}

login = function () {
    
    var datos = $('#loginForm').serialize();
    var rutaLogin = $('#rutaLogin').val();
    
    var url = rutaLogin+"ajax/login.php?op=login";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
//             console.log(result);
            if (result.status == true) {
                alert(result.message);
                location.reload();
                window.location.href = rutaLogin;
            } else {
                alert(result.message);
            }
        }
    });

    return false;
}

loginclose = function () {
    
    var rutaLogin = $('#rutaLogin').val();
    
    var url = rutaLogin+"ajax/login.php?op=loginClose";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        success: function (result)
        {
//             console.log(result);
            if (result.status == true) {
                alert(result.message);
                location.reload();
                window.location.href = rutaLogin;
            } else {
                alert(result.message);
            }
        }
    });

    return false;
}

