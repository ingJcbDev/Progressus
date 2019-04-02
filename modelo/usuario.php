<?php
include_once('../config/db.php');


class UsuarioSql
{

    // Constructor
	public function __construct()
	{
        
    }
    
    public function allUser()
    {
        global $connection;
        $sql="SELECT * FROM usuario;";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // echo"<pre><br> _REQUEST***************:\n";
        // print_r($result);
        // echo"</pre><br> :\n";
        // DIE();
        return $result;
    }

    public function InsertUser()
    {
        global $connection;
        $sql="SELECT * FROM usuario;";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // echo"<pre><br> _REQUEST***************:\n";
        // print_r($result);
        // echo"</pre><br> :\n";
        // DIE();
        return $result;
    }
    
}

// echo"<pre><br> _GET:\n";
// print_r($_GET);
// echo"</pre><br> :\n";
// echo"<pre><br> _POST:\n";
// print_r($_POST);
// echo"</pre><br> :\n";
// echo"<pre><br> _REQUEST:\n";
// print_r($_REQUEST);
// echo"</pre><br> :\n";
// DIE();

// INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`) VALUES (NULL, 'usuario root', 'CC', '1151948216', 'cali clll cll cra', '518500', 'root@gmail.com', 'Administrador', 'root', '123', '1');

// switch ($_GET["op"]) {
//     case 'listar':
//         $sql="SELECT * FROM usuario;";
//         $statement = $connection->prepare($sql);
//         $statement->execute();
//         $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
//         echo json_encode(array('data'=> $result));
//     break;
    
// }


    

?>