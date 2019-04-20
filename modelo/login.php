<?php

include_once('../config/db.php');

class LoginSql {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    public function __destruct() {
        $this->con->close_con();
    }    
    
    public function login($datos) {
        try {
            $sql = "SELECT COUNT(*) AS reslt FROM usuario WHERE login='$datos[login0]' AND clave='$datos[clave0]' AND condicion=1;";
            $query = $this->con->prepare($sql);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return (int) $res['reslt'];
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function datoUser($datos) {
        try {
            $sql = "SELECT * FROM usuario WHERE login='$datos[login0]' AND clave='$datos[clave0]';";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }    
    
    

}

?>