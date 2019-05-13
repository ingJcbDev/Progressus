$(document).ready(function () {
    
    cargarDatosMaterias();
    
});

cargarDatosMaterias = function () {
    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var ruta = $("#ruta").val();
    submenu = {submenu: submenu1};
    $.ajax({
        type: "POST",
        url: '../ajax/materias.php?op=loadAll',
        dataType: "json",
        data: submenu,
        success: function (data) {
            var array = data.data;

//            console.log(array);

            Html = '<ul class="list-group">';
            $.each(array, function (key, registro) {
//            console.log(registro);
                Html += '<li class="list-group-item text_center"><a id="a_'+menu+'_'+submenu1+'_'+registro.materias_id+'" name="a_'+menu+'_'+submenu1+'_'+registro.materias_id+'" onclick="menuSubmenu(this);" href="#" class="dropdown-item">'+registro.descripcion+'</a></li>';
            });
            Html += '</ul>';

            $("#listasMaterias").html(Html);
        },
        error: function (data) {
            alert('error');
        }
    });
}

menuSubmenu = function (obj) {
    
        var Id = obj.id;
        var result = Id.split('_');
        menu = result[1];
        submenu = result[2];
        materia=result[3];
        menuActivo(menu, submenu, materia);
        
    console.log(result);
    alert('dddddddddddd');

    
}

menuActivo = function (menu, submenu, materia) {
//    alert(materia);
    var datos = {menu: menu, submenu:submenu, materia:materia};
    var rutaLogin = $('#rutaHeader').val();
    
    console.log(rutaLogin);
    alert(222222);
    
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
