var tabla;

$(document).ready(function () {


    $(".valEmail").keypress(function (key) {
//        window.console.log(key.charCode) //para ver el codigo de la letra
        if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 64) //@
                && (key.charCode != 95) //_
                && (key.charCode != 46) //.
                && (key.charCode != 0) //borrar
                && (key.charCode < 47 || key.charCode > 57) //numeros
                )
            return false;
    });    

    callAllUser();
  
});


callAllUser = function () {

    var response = null;
    $.ajax({
        type: "POST",
        url: '../ajax/usuario.php?op=listar',
        async: false,
        success: function (result) {
            response = JSON.parse(result).data;
        }
    });

     //console.log("res-> \n");
     //console.log(response);

    tabla=$('#user_data').DataTable({
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
            // { "data": "idusuario" },
            { "data": "nombre" },
            { "data": "tipo_documento" },
            { "data": "direccion" },
            { "data": "telefono" },
            { "data": "email" },
            { "data": "cargo" },
            { "data": "login" },
            {data: null, render: function (data, type, row) {
                return  data.condicion === '1' ? '<i class="fas fa-user-check" style="font-size:18px;color:green" title="Activo"></i>' : '<i class="fas fa-user-shield" style="font-size:18px;color:red" title="inactivo"></i>';
                }, className: "center"
            }, 
            {data: null, render: function (data, type, row) {
                return  '<i class="fa fa-pencil-square-o fa-4 pointer" aria-hidden="true" style="font-size:18px;color:blue" onclick=\"activarInativar(' + data.idusuario + ')\" title="Modificar Usuario"></i>&nbsp; | &nbsp;\n\
                        <i class="fas fa-trash-alt" style="font-size:18px;color:red" onclick=\"activarInativar(' + data.idusuario + ')\" title="Eliminar Usuario"></i>';
                }, className: "center"
            }                       
        ]
    });
    
};

activarInativar = function (idusuario){
    alert(idusuario);
    //tabla.ajax.reload();
    //location.reload();
}

bloquearModal = function (){
        $("#userModal").modal({backdrop: "static", keyboard: false})
        $("#userModal").modal("show");  
}

registrarUsuario = function (){

    var datos = $('#registroUsuario').serialize();
    var ruta = $('#ruta').val();
    var clave=$('#clave').val();
    var clave1=$('#clave1').val();
    var response = null;
    var result = null;
        
    if(clave != clave1){
        alert("La contraseña no coinciden");
        return false;
    }
    
    var url = "../ajax/usuario.php?op=insert";
    $.ajax({                        
        type: "POST",                 
        url: url,
        dataType: "json",
        data: datos,                    
            success: function(result)            
            {
                // console.log(result);

                if(result.status==false){
                    alert(result.message);
                }
                if(result.status==true){
                    alert(result.message);
                    window.location.href = ruta; 
                }

            }
    });

    
     
    
return false;
    
    
    
    
    
    
                
    //return true;
}

cleanModal = function (){
    $('#tipo_documento').val("");
    $('#num_documento').val("");
    $('#nombre').val("");
    $('#direccion').val("");
    $('#telefono').val("");
    $('#telefono').val("");
    $('#email').val("");
    $('#cargo').val("");
    $('#login').val("");
    $('#clave').val("");
    $('#clave1').val("");
    
    return true;
}