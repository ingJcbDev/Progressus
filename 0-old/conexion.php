<?php



    $usuario = "root"; //en ste caso root por ser localhost
    $password = "";  //contraseña por si tiene algun servicio de hosting 
    $servidor = "localhost"; //localhost por lo del xampp
    $basededatos ="datos"; //nombre de la base de datos


//por si hay errors de conexion un mensaje "Error con el servidor de la Base de datos".
$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("Error con el servidor de la Base de datos"); 


//por si hay errors de conexion un mensaje "Error al conectarse a la Base de datos".
$db = mysqli_select_db($conexion, $basededatos) or die ("Error conexion al conectarse a la Base de datos");


        //recuperar las variables
    $codigo=$_POST['codigo'];
    $nombre=$_POST['nombre']; //name="nombre"
    $apellido=$_POST['apellido']; //name="correo"
    $correo=$_POST['correo'];
    $grado=$_POST['grado'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena']; 
    $btn=$_POST['btn']; 

    //sentenciasql
    
 
     //manda a traer los valores d//manda a traer los valores de '$nombre','$correo','$mensaje'
    
      //ejecutamos la centencia de sql
    


    //verificacion de la ejecucioon
   

    switch ($btn) {
        case 'Agregar':
            $sql="INSERT INTO datos (nombre,apellido,correo,grado,usuario,contrasena)VALUES('$nombre','$apellido','correo','$grado', '$usuario', '$contrasena')"; 
            $Action = "Datos Almacenados correctamente";
            break;
        case 'Actualizar':
             $sql="UPDATE datos SET nombre='$nombre', apellido='$apellido', correo='correo' , grado='$grado',usuario ='usuario',contrasena = '$contrasena' Where codigo='$codigo'";
              if ($codigo == "")
                {$Action = "Debe Ingresar un Codigo a Modificar";}
              else{
                $Action = "Datos Actualizados correctamente";
              }
              
             break;
        case 'Eliminar':
             $sql="DELETE FROM datos Where codigo ='$codigo'"; 
             if ($codigo == "")
                {$Action = "Debe Ingresar un Codigo a Eliminar";}
              else{
                $Action = "Registro Eliminado correctamente";
              }
              
             break;
        default:
            
            break;
    }
    $ejecutar=mysqli_query($conexion, $sql);
     if(!$ejecutar){
        echo"huvo algun error " . $sql; //si algo sale mal mandanos este mensaje
    }else{
        echo "<div align=\"center\"> <head> <title>Volver </title> <link rel=\"stylesheet\" href=\"css/style.css\"></head>" . "<div class=\"container\" id = \"contact\" align=\"center\">  <div align=\"center\"><h3>Regresar</h3>" . $Action . "<br><a href='index.html'>volver</a></div></div></div>"; //si todo sale bien mandanos este mensaje
    }

     
?>﻿