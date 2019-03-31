<?php
// Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php"; 

/**
* 
*/
class Categoria {
	
	// Constructor
	public function __construct()
	{
		# code...
	}

	// Metodo de insert registros tabla categoria
	public function insertar ($nombre, $descripcion)
	{
		$sql="INSERT INTO categoria (nombre, descripcion, condicion) VALUES ('$nombre', '$descripcion', '1')";
		return ejecutarConsulta($sql);
	}

	// Metodo de update registros tabla categoria
	public function editar ($idcategoria, $nombre, $descripcion)
	{
		$sql="UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	// Metodo de update desactivar categoria
	public function desactivar ($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

    // Metodo de update activar categoria
	public function activar ($idcategoria)
	{
		$sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	// mostrar solo una fila 
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	// mostrar lista de registros 
	public function listar()
	{
		$sql="SELECT * FROM categoria";
		return ejecutarConsulta($sql);
	}

	// mostrar select de las categorias 
	public function select()
	{
		$sql="SELECT * FROM categoria where condicion=1;";
		return ejecutarConsulta($sql);
	}

}

?>