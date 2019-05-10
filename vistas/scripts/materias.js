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
                Html += '<li class="list-group-item text_center"><a id="a_'+menu+'_'+submenu1+'_'+registro.materias_id+'" name="a_'+menu+'_'+submenu1+'_'+registro.materias_id+'" onclick="prueba(this);" href="#" class="dropdown-item">'+registro.descripcion+'</a></li>';
            });
            Html += '</ul>';

            $("#listasMaterias").html(Html);
        },
        error: function (data) {
            alert('error');
        }
    });
}

prueba = function (obj) {
    
            var Id = obj.id;
        var result = Id.split('_');
//        console.log(result);
        alert('Epa la repa');
        menu = result[1];
        submenu = result[2];
//        menuActivo(menu, submenu);

    console.log(result);
    alert('dddddddddddd');

    
}
