$(document).ready(function () {

    $(".myClass").on('click', function (event) {

        var Id = this.id;
        var result = Id.split('_');
        console.log(result);
//        alert(true);
        menu = result[1];
        submenu = result[2];
        menuActivo(menu, submenu);

    });

    cargarDatosMaterias()
});

cargarDatosMaterias = function () {
    var submenu = $("#subMenuActivo").val();
    var ruta = $("#ruta").val();
    submenu = {submenu: submenu};
    $.ajax({
        type: "POST",
        url: '../ajax/materias.php?op=loadAll',
        dataType: "json",
        data: submenu,
        success: function (data) {
            var array = data.data;

            console.log(array);

            Html = '<ul class="list-group">';
            $.each(array, function (key, registro) {
                Html += '<li class="list-group-item text_center">Dapibus ac facilisis in</li>';
            });
            Html += '</ul>';

            $("#listasMaterias").html(Html);
        },
        error: function (data) {
            alert('error');
        }
    });
}