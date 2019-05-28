<?php

include_once('../config/db.php');

class Preguntas {

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
                            AND p.periodo_id = " . $datos['periodo'] . ";";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function allPeriodo($datos) {
        try {
            $sql = '
                    SELECT m.descripcion AS materia
                            ,p.descripcion AS periodo
                    FROM materias m
                    INNER JOIN materias_periodos AS mp ON (m.materias_id = mp.materias_id)
                    INNER JOIN periodo p ON (mp.periodo_id = p.periodo_id)
                    WHERE m.materias_id = ' . $datos['materia'] . '
                            AND p.periodo_id = ' . $datos['periodo'] . ';';
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
    
    public function updateTema($datos) {
        try {
            
            
            $sw_estado = ($datos['sw_estado']=='1')?'0':'1';
            
            $sql = "UPDATE temas
                    SET sw_estado='".$sw_estado."'
                    WHERE temas_id=".$datos['temas_id'].";
                    ";
            $query = $this->con->prepare($sql);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertPregunta($datos) {

        $this->con->beginTransaction();

        $datosM = $_SESSION['dataUser']['M'];

        try {
            $sql = "INSERT INTO temas (
                                    titulo
                                    ,descripcion
                                    )
                            VALUES (
                                    '" . $datos['tituloTema'] . "'
                                    ,'" . $datos['temaTextarea'] . "'
                                    );";

            $query = $this->con->prepare($sql);
            $query->execute();
            $temas_id = $this->con->lastInsertId();
        } catch (PDOException $e) {
            $this->con->rollback();
            echo $e->getMessage();
            return false;
        }
        
        try {

            $sql = "INSERT INTO periodos_temas (
                                    temas_id
                                    ,periodo_id
                                    )
                            VALUES (
                                    $temas_id
                                    ," . $datosM['periodo'] . "
                                    );";
            $query = $this->con->prepare($sql);
            $query->execute();
            $periodos_temas_id = $this->con->lastInsertId();
        } catch (PDOException $e) {
            $this->con->rollback();
            echo $e->getMessage();
            return false;
        }

        foreach ($datos as $key => $value) {

            $key1 = explode("_", $key);

            if ($key1['0'] == "pregunta") {



                try {
                    $sql = "INSERT INTO preguntas (
                                    periodos_temas_id
                                    ,descripcion
                                    ,sw_estado
                                    )
                            VALUES (
                                    $periodos_temas_id
                                    ,'" . $value . "'
                                    ,'1'
                                    );";
                    $query = $this->con->prepare($sql);
                    $query->execute();
                    $pregunta_id = $this->con->lastInsertId();
                    $this->pregunta_detalle($datos, $pregunta_id, $key1['1']);
                } catch (PDOException $e) {
                    $this->con->rollback();
                    echo $e->getMessage();
                    return false;
                }
            }//if pregunta
        }//forech

        $this->con->commit();
        return true;
    }

    public function pregunta_detalle($datos, $pregunta_id, $pregunta) {

        foreach ($datos as $key => $value) {

            $key1 = explode("_", $key);
            $value1 = explode("_", $value);


            if ($key1['0'] == "respuesta" && $pregunta == $key1['1']) {

                $respuesta = $this->respuestas($datos, $key1);

                try {
                    $sql = "INSERT INTO pregunta_detalle (
                                                            pregunta_id
                                                            ,descripcion
                                                            ,respuesta
                                                            )
                                                    VALUES (
                                                            $pregunta_id
                                                            ,'" . $value . "'
                                                            ,'" . $respuesta . "'
                                                            );";
                    $query = $this->con->prepare($sql);
                    $query->execute();
                } catch (PDOException $e) {
                    $this->con->rollback();
                    echo $e->getMessage();
                    return false;
                }
            }
        }
    }

    public function respuestas($datos, $respuesta) {


        foreach ($datos as $key => $value) {

            $key1 = explode("_", $key);
            $value1 = explode("_", $value);

            if (isset($key1['1'])) {
                if ($respuesta['1'] == $key1['1']) {
                    if ($key1['0'] == "radioRespuesta") {

                        if ($value1['1'] == $respuesta['1'] && $value1['2'] == $respuesta['2']) {
                            return '1';
                        } else {
                            return '0';
                        }
                    }
                }
            }
        }
    }

}

//echo"sql:<pre>";
//print_r($sql);
//echo"</pre>";
//die();

//fin de la clase
?>