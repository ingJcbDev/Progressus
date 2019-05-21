<?php

include_once('../config/db.php');

class Respuestas {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    public function __destruct() {
        $this->con->close_con();
    }

    public function loadPreguntas($datos) {
        try {
            $sql = "SELECT m.materias_id
                            ,m.descripcion AS materia
                            ,p.periodo_id
                            ,p.descripcion AS periodo
                            ,t.temas_id
                            ,t.titulo AS titulo_tema
                            ,t.sw_estado
                    FROM materias m
                    INNER JOIN periodo p ON (m.materias_id = p.materias_id)
                    INNER JOIN periodos_temas pt ON (p.periodo_id = pt.periodo_id)
                    INNER JOIN temas t ON (pt.temas_id = t.temas_id)
                    WHERE m.materias_id = " . $datos['materia'] . "
                            AND t.sw_estado = '1'
                            AND p.periodo_id = " . $datos['periodo'] . ";";
//echo"<pre><br>sql:";
//print_r($sql);
//echo"</pre><br>";  
//die();
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