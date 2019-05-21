$(document).ready(function () {

    cargarDatosTemas();

});

cargarDatosTemas = function () {
    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var materia = $("#materia").val();
    var periodo = $("#periodo").val();
    var perfil = $("#perfil").val();
    var ruta = $("#ruta").val();

    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};

    $.ajax({
        type: "POST",
        url: ruta + 'ajax/respuestas.php?op=loadAll',
        dataType: "json",
        data: datos,
        success: function (data) {
            var array = data.data;


            if (array.length != 0) {
             
             
             Html = '<ul class="list-group">';
             $.each(array, function (key, registro) {
            console.log(registro);
             Html += '<li class="list-group-item text_center"><a id="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" name="a_' + menu + '_' + submenu1 + '_' + registro.materias_id + '_' + registro.periodo_id + '" onclick="menuSubmenu(this); modalParaRespuestas('+registro.temas_id+');" href="#" class="dropdown-item">'+registro.titulo_tema+'</a></li>';
             h5 = '('+registro.materia+' - '+registro.periodo+')';
             });
             Html += '</ul>';
             
             $("#listasTema").html(Html);
             $("#titleTema").html(h5);
             
             } else {
             alert('No existen datos registrados para la seleccion');
             location.reload();
             window.location.href = ruta;
             }
             
             
        },
        error: function (data) {
            alert('error *-*');
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

modalParaRespuestas = function (temas_id) {
    
    alert(temas_id);
    
}