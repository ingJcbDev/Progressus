<!DOCTYPE html>
<html lang="es">
<h1><a href="signin.html">Ingreso</a></h1>
<?php



$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a base de datos..

$conexion=mysqli_connect("localhost", "root", "", "datos");
$consulta="SELECT * FROM datos WHERE usuario='$usuario' and contrasena='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0) { 
	header("location:indexusuario.html");
}
else {
	echo "Error al ingresar los datos o su cuenta no esta registrada, vuelve a ingresar tus datos en el enlace de arriba...";

}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
</html>
