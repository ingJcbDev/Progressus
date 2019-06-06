<?php

include_once('../config/db.php');

class Reporte_estudiantes {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }

    public function __destruct() {
        $this->con->close_con();
    }

    public function allNotas($datos, $idusuario) {
        try {
            $sql = "select m.*,nmp.*
                        from nota_materia_periodo nmp 
                        inner join materias m on (nmp.materias_id=m.materias_id)
                        where nmp.idusuario = $idusuario;";
//        echo"<pre><br>sql:";
//        print_r($sql);
//        echo"</pre><br>";
////        die();            
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

   

}

//fin de la clase
?>