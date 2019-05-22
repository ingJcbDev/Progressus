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
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }    
    public function loadTema($datos) {
        try {
            $sql = "SELECT t.temas_id
                            ,t.titulo
                            ,t.descripcion
                    FROM temas t
                    WHERE t.sw_estado = '1'
                            AND t.temas_id = " . $datos['temas_id'] . ";";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }       
    public function loadPreguntass($datos) {
        try {
            $sql = "SELECT t.temas_id
                            ,pt.periodos_temas_id
                            ,p.pregunta_id
                            ,p.descripcion AS pregunta
                    FROM temas t
                    INNER JOIN periodos_temas AS pt ON (pt.temas_id = t.temas_id)
                    INNER JOIN preguntas AS p ON (pt.periodos_temas_id = p.periodos_temas_id)
                    WHERE t.sw_estado = '1'
                            AND t.temas_id = " . $datos['temas_id'] . ";";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }    
    public function loadRespuestas($datos) {
        try {
            $sql = "SELECT t.temas_id
                            ,pt.periodos_temas_id
                            ,p.pregunta_id
                            ,pd.pregunta_detalle_id
                            ,pd.descripcion AS pregunta_detalle
                            ,pd.respuesta
                    FROM temas t
                    INNER JOIN periodos_temas AS pt ON (pt.temas_id = t.temas_id)
                    INNER JOIN preguntas AS p ON (pt.periodos_temas_id = p.periodos_temas_id)
                    INNER JOIN pregunta_detalle AS pd ON (pd.pregunta_id = p.pregunta_id)
                    WHERE t.sw_estado = '1'
                            AND t.temas_id = " . $datos['temas_id'] . ";";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }    
    
 
//echo"<pre><br>sql:";
//print_r($sql);
//echo"</pre><br>";  
//die();
}

//fin de la clase
?>