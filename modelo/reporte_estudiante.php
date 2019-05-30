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
            $sql = "SELECT m.materias_id
                            ,m.descripcion AS materia
                            ,p.periodo_id
                            ,p.descripcion AS periodo
                            ,nmp.nota_periodo
                            ,nmp.idusuario
                    FROM materias m
                    INNER JOIN materias_periodos mp ON (m.materias_id = mp.materias_id)
                    INNER JOIN periodo p ON (p.periodo_id = mp.periodo_id)
                    INNER JOIN nota_materia_periodo nmp ON (
                                    nmp.materias_id = m.materias_id
                                    AND nmp.periodo_id = p.periodo_id
                                    )
                    WHERE nmp.idusuario = $idusuario
                    ORDER BY materias_id
                            ,periodo_id;";
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