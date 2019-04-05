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
    
    public function existsLogin($datos)
    {
        try {
            $sql="SELECT COUNT(*) AS reslt FROM usuario WHERE login='$datos[login]';";
            $query = $this->con->prepare($sql);
            $query->execute();
            $this->con->close_con();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return (int) $res['reslt'];  
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        
    }
    public function existsTipoDocume($datos)
    {
        try {
            $sql="SELECT COUNT(*) AS reslt FROM usuario WHERE tipo_documento='$datos[tipo_documento]' AND num_documento='$datos[num_documento]';";
            $query = $this->con->prepare($sql);
            $query->execute();
            $this->con->close_con();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return (int) $res['reslt'];  
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        
    }
    public function existsEmail($datos)
    {
        try {
            $sql="SELECT COUNT(*) AS reslt FROM usuario WHERE email='$datos[email]';";
            // echo"<pre><br> sql:\n";
            // print_r($sql);
            // echo"</pre><br> :\n";
            // DIE();            
            $query = $this->con->prepare($sql);
            $query->execute();
            $this->con->close_con();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return (int) $res['reslt'];  
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        
    }

    public function InsertUser($datos)
    {
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

            $query = $this->con->prepare($sql);
            $result = $query->execute();
            $this->con->close_con();
        } catch (PDOException $e) {

            echo $e->getMessage();
        }        

        return $result;
    }
    
    public function deleteUsuario($datos){

        try{
            $sql="DELETE FROM usuario WHERE idusuario=$datos[idusuario];";
            $query = $this->con->prepare($sql);
            $result = $query->execute();
            $this->con->close_con();
        } catch (PDOException $e) {

            echo $e->getMessage();
        }        

        return $result;        
    }
    
    
//echo"<pre><br>sql:";
//print_r($sql);
//echo"</pre><br>";            
    
}


?>