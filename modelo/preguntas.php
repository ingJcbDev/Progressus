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
            $sql = "SELECT DISTINCT m.materias_id
                                    ,m.descripcion as materia
                                    ,pe.periodo_id
                                    ,pe.descripcion as periodo
                                    ,t.temas_id
                                    ,t.titulo as titulo_tema
                                    ,t.sw_estado
                            FROM temas t
                            INNER JOIN preguntas p ON (t.temas_id = p.periodo_id)
                            INNER JOIN periodo pe ON (p.periodo_id = pe.periodo_id)
                            INNER JOIN materias m ON (m.materias_id = pe.materias_id)
                            WHERE m.materias_id = " . $datos['materia'] . "
                            AND pe.periodo_id = " . $datos['periodo'] . "
                            AND t.sw_estado = '1';";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
    public function allPeriodo($datos) {
        try {
            $sql = 'select
                            m.descripcion as materia, p.descripcion as periodo
                    from
                            materias m
                    inner join periodo p on
                            (m.materias_id = p.materias_id)
                    where
                            m.materias_id = ' . $datos['materia'] . '
                            and p.periodo_id = ' . $datos['periodo'] . ';';
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
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


        foreach ($datos as $key => $value) {

            $key1 = explode("_", $key);

            if ($key1['0'] == "pregunta") {

                try {
                    $sql = "INSERT INTO preguntas (
                                periodo_id
                                ,tema_id
                                ,descripcion
                                )
                        VALUES 
                                (
                                " . $datosM['periodo'] . "
                                ,$temas_id
                                ,'" . $value . "'
                                )
                                ;";

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

//fin de la clase
?>