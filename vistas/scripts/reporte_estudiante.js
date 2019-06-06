$(document).ready(function () {
    
    
    $('#reporteEstudiantes').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );    

loadNotas();

});

loadNotas = function () {
    var ruta = $("#ruta").val();
    var nombre = $("#nombre").val();
    
//    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};
    var response = null;

    $("#reporteEstudiantes").dataTable().fnDestroy();

    var url = ruta + "ajax/reporte_estudiante.php?op=loadData";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
//        data: datos,
        success: function (result)
        {
            response = result.data;
            
            console.log(response);
            
            tabla = $('#reporteEstudiantes').DataTable({
                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ],                
                    buttons: [
            {
                extend: 'copy',
                title: 'Reporte de Notas del Estudiante -> '+nombre
            },
            {
                extend: 'csv',
                title: 'Reporte de Notas del Estudiante -> '+nombre
            },
            {
                extend: 'excel',
                title: 'Reporte de Notas del Estudiante -> '+nombre
            },
            {
                extend: 'pdf',
                title: 'Reporte de Notas del Estudiante -> '+nombre
            },
            {
                extend: 'print',
                title: 'Reporte de Notas del Estudiante -> '+nombre
            }
                    ],                
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
                    {"data": "descripcion"},
                    {"data": "nota_periodo_1"},
                    {"data": "nota_periodo_2"},
                    {"data": "nota_periodo_3"},
                    {"data": "nota_periodo_4"},
                    {"data": "nota_final"},
                ]
                
            });
        },
        error: function (response) {
            console.log(response);
            alert('error');
        }
    });        
    
}


/*

loadPreguntas = function () {

    var menu = $("#menuActivo").val();
    var submenu1 = $("#subMenuActivo").val();
    var materia = $("#materia").val();
    var periodo = $("#periodo").val();
    var ruta = $("#ruta").val();
    var perfil = $("#perfil").val();

    datos = {menu: menu, submenu: submenu1, materia: materia, periodo: periodo};
    var response = null;

    $("#preguntas_table").dataTable().fnDestroy();

    var url = ruta + "ajax/preguntas.php?op=loadData";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: datos,
        success: function (result)
        {
            response = result.data;
            console.log(response);
            tabla = $('#preguntas_table').DataTable({
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
//                    {"data": "materias_id"},
                    {"data": "materia"},
                    {"data": "periodo"},
                    {"data": "titulo_tema"},
                    {data: null, render: function (data, type, row) {
                            return  data.sw_estado === '1' ? '<i class="fa fa-toggle-on" style="font-size:20px;color:cornflowerblue" onclick=\"updateTema(' + data.temas_id + ', ' + data.sw_estado + ')\" title="Activo"></i>' : '<i class="fa fa-toggle-off" style="font-size:20px;color:darkgrey" onclick=\"updateTema(' + data.temas_id + ', ' + data.sw_estado + ')\" title="inactivo"></i>';
                        }, className: "center"
                    }
                ]
            });
        },
        error: function (response) {
            console.log(response);
            alert('error');
        }

    });
    updateTema = function (temas_id, sw_estado) {

        if (confirm("Seguro de actualizar el dato?")) {

            var ruta = $("#ruta").val();

            datos = {temas_id: temas_id, sw_estado: sw_estado};

            $.ajax({
                type: "POST",
                url: ruta + 'ajax/preguntas.php?op=updateTema',
                dataType: "json",
                data: datos,
                success: function (data) {
//                var array = data.data;
//                    console.log(data);
                    if (data.status == true) {
                        loadPreguntas();
                        alert('Datos actualizados satisfactoriamente');

                    } else {
                        alert('Error al actualizar los datos');
                    }

                },
                error: function (data) {
                    console.log(data);
                    alert('error');
                }
            });
        }
    }

};

*/