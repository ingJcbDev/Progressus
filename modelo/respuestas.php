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
            $sql = "
select m.materias_id
	,m.descripcion AS materia
	,p.periodo_id
	,p.descripcion AS periodo	
	,t.temas_id
	,t.titulo AS titulo_tema
	,t.sw_estado	
from materias_periodos mp 
inner join materias m on (m.materias_id=mp.materias_id)
inner join periodo p on (p.periodo_id=mp.periodo_id)
inner join periodos_temas pt on (pt.periodo_id=mp.periodo_id)
inner join temas t on (t.temas_id=pt.temas_id and t.materias_id=m.materias_id)
where mp.materias_id = " . $datos['materia'] . "
and mp.periodo_id = " . $datos['periodo'] . "
and t.sw_estado='1';";
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
    
    public function temaRegistrado($datos, $idusuario) {
        try {
            $sql = "SELECT tn.*
                            ,t.temas_id
                            ,t.titulo
                            ,r.*
                    FROM temas_notas AS tn
                    INNER JOIN temas AS t ON (t.temas_id = tn.temas_id)
                    INNER JOIN respuestas AS r ON (r.temas_notas_id = tn.temas_notas_id)
                    WHERE tn.idusuario = $idusuario
                            AND tn.temas_id = ".$datos['temas_id'].";";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertNotas($datos, $nDef, $idusuario) {

        $tema_id = $datos['tema_id'];

        $this->con->beginTransaction();

        try {
            $sql = "INSERT INTO temas_notas (
                            temas_id
                            ,nota
                            ,idusuario
                            )
                    VALUES (
                            $tema_id
                            ,$nDef
                            ,$idusuario
                            );";

            $query = $this->con->prepare($sql);
            $query->execute();
            $temas_notas_id = $this->con->lastInsertId();
        } catch (PDOException $e) {
            $this->con->rollback();
            echo $e->getMessage();
            return false;
        }

        foreach ($datos as $key => $value) {
            $valueR = explode('_', $value);
            if($valueR['0']==='radioRespuesta') {
                try {
                    $sql = "INSERT INTO progressus.respuestas (
                            pregunta_id
                            ,pregunta_detalle_id
                            ,temas_notas_id
                            )
                    VALUES (
                            ".$valueR['1']."
                            ,".$valueR['2']."
                            ,$temas_notas_id
                            );
                    ";

                    $query = $this->con->prepare($sql);
                    $query->execute();
                } catch (PDOException $e) {
                    $this->con->rollback();
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        $this->con->commit();
        return true;
    }

}

//fin de la clase
?>