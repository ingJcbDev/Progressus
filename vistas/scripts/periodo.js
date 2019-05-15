$(document).ready(function () {

    cargarDatosPeriodo();

});

cargarDatosPeriodo = function () {
    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var materia = $("#materia").val();
    var ruta = $("#ruta").val();
    var perfil = $("#perfil").val();

    datos = {menu: menu, submenu: submenu1, materia: materia};

    $.ajax({
        type: "POST",
        url: ruta + 'ajax/periodo.php?op=loadAll',
        dataType: "json",
        data: datos,
        success: function (data) {
            var array = data.data;

            console.log(array);

            if (array.length != 0) {
                
                if(perfil=='1'){
                $("#profesor").css('display', 'block');
                $("#estudiante").css('display', 'block');
                }
                if(perfil=='2'){
                $("#profesor").css('display', 'block');
                }
                if(perfil=='3'){
                $("#estudiante").css('display', 'block');
                }

                Html = '<ul class="list-group">';
                $.each(array, function (key, registro) {
                    Html += '<li class="list-group-item text_center"><a id="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" name="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" onclick="menuSubmenu(this);" href="#" class="dropdown-item">' + registro.descripcion + '</a></li>';
                    h5 = registro.masteria;
                });
                Html += '</ul>';
                
                $("#listasPeriodos").html(Html);
                $("#titleMateria").html(h5);
                
                Html1 = '<ul class="list-group">';
                $.each(array, function (key, registro) {
                    Html1 += '<li class="list-group-item text_center"><a id="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" name="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" onclick="menuSubmenu(this);" href="#" class="dropdown-item">' + registro.descripcion + '</a></li>';
                    h51 = registro.masteria;
                });
                Html += '</ul>';

                $("#listasPeriodos1").html(Html1);
                $("#titleMateria1").html(h51);

            } else {
                alert('No existen datos registrados para la seleccion');
                location.reload();
                window.location.href = ruta;
            }
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
