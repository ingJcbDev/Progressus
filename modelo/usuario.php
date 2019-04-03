<?php
include_once('../config/db.php');


class UsuarioSql
{
    private $con;
    // Constructor
	public function __construct()
	{
        $this->con = new Database();
    }
    
    public function allUser()
    {
        // global $connection;
        // $sql="SELECT * FROM usuario;";
        // $statement = $connection->prepare($sql);
        // $statement->execute();
        // $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        try {

            $query = $this->con->prepare('SELECT * FROM usuario;');
            $query->execute();
            $this->con->close_con();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        
        // echo"<pre><br> _REQUEST***************:\n";
        // print_r($result);
        // echo"</pre><br> :\n";
        // DIE();
        //return $result;
    }

    public function InsertUser($datos)
    {
        // global $connection;
        // $sql="INSERT INTO usuario (nombre, tipo_documento, num_documento, direccion, telefono, email, cargo, login, clave, condicion) 
        // VALUES ('usuario root', 'CC', '1151948216', 'cali clll cll cra', '518500', 'root@gmail.com', 'Administrador', 'root8', '123', '1');";

        // $statement = $connection->prepare($sql);
        // $resultado = $statement->execute();

        
        try {
            $sql = "INSERT INTO usuario (
                nombre
                ,tipo_documento
                ,num_documento
                ,direccion
                ,telefono
                ,email
                ,cargo
                ,LOGIN
                ,clave
                ,condicion
                )
            VALUES (
                '$datos[nombre]'
                ,'$datos[tipo_documento]'
                ,'$datos[num_documento]'
                ,'$datos[direccion]'
                ,'$datos[telefono]'
                ,'$datos[email]'
                ,'$datos[cargo]'
                ,'$datos[login]'
                ,'$datos[clave]'
                ,'$datos[condicion]'
                );";

        echo"<pre><br> _GET:\n";
        print_r($datos);
        echo"</pre><br> :\n";
        echo"<pre><br> sql:\n";
        print_r($sql);
        echo"</pre><br> :\n";
        DIE("_________________ff");

            $query = $this->con->prepare($sql);
            $result = $query->execute();
            $this->con->close_con();
        } catch (PDOException $e) {

            echo $e->getMessage();
        }        

        // echo"<pre><br> var_dump:\n";
        // var_dump($result);
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

// INSERT INTO usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`) VALUES (NULL, 'usuario root', 'CC', '1151948216', 'cali clll cll cra', '518500', 'root@gmail.com', 'Administrador', 'root', '123', '1');

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