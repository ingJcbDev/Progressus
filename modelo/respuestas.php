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
//        die();            
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
                            AND tn.temas_id = " . $datos['temas_id'] . ";";
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
            if ($valueR['0'] === 'radioRespuesta') {
                try {
                    $sql = "INSERT INTO progressus.respuestas (
                            pregunta_id
                            ,pregunta_detalle_id
                            ,temas_notas_id
                            )
                    VALUES (
                            " . $valueR['1'] . "
                            ," . $valueR['2'] . "
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

    public function insertNotaFinPeriodo($datos, $idusuario) {

        $materia1 = $datos['materia1'];
        $periodo1 = $datos['periodo1'];

        $this->con->beginTransaction();

        try {
            $sql = "SELECT tn.temas_id
                            ,tn.nota
                            ,tn.idusuario
                            ,p.periodo_id
                            ,p.descripcion AS periodo
                            ,t.temas_id
                            ,t.descripcion AS temas
                            ,m.materias_id
                            ,m.descripcion AS materia
                    FROM temas_notas tn
                    INNER JOIN temas t ON (tn.temas_id = t.temas_id)
                    INNER JOIN periodos_temas pt ON (pt.temas_id = t.temas_id)
                    INNER JOIN periodo p ON (pt.periodo_id = p.periodo_id)
                    INNER JOIN materias m ON (t.materias_id = m.materias_id)
                    WHERE tn.idusuario = $idusuario
                            AND m.materias_id = $materia1
                            AND p.periodo_id = $periodo1;";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resData = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }



        $cant = count($resData);
        $nF = 0;

        if ($cant > 0) {



            foreach ($resData as $key => $value) {
                $nF = $value['nota'] + $nF;
            }
            $nF = $nF / $cant;
            $nF = number_format($nF, 1, '.', '');


            try {
                $sql = "SELECT *
                    FROM nota_materia_periodo
                    WHERE materias_id = $materia1
                            AND idusuario = $idusuario;";

                $query = $this->con->prepare($sql);
                $query->execute();
                $resData1 = $query->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            try {
                $sql = "SELECT *
                    FROM system_variables
                    WHERE descripcion = 'porcentaje_notas'";

                $query = $this->con->prepare($sql);
                $query->execute();
                $porcentajeNota = $query->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            
            $pn = explode("|", $porcentajeNota['valor']);
            $np1 =  $pn['0']; 
            $np2 =  $pn['1']; 
            $np3 =  $pn['2']; 
            $np4 =  $pn['3']; 

//                    echo"-->:<pre><br>";
//                    var_dump($np1);
//                    echo"</pre><br>";
//                    die();

            if (!empty($resData1)) {

                $nota_periodo_1 = ($periodo1 === '1') ? $nF : $resData1['nota_periodo_1'];
                $nota_periodo_2 = ($periodo1 === '2') ? $nF : $resData1['nota_periodo_2'];
                $nota_periodo_3 = ($periodo1 === '3') ? $nF : $resData1['nota_periodo_3'];
                $nota_periodo_4 = ($periodo1 === '4') ? $nF : $resData1['nota_periodo_4'];
                $nota_final = (($nota_periodo_1 * $np1) + ($nota_periodo_2 * $np2) + ($nota_periodo_3 * $np3) + ($nota_periodo_4 * $np4));
                
                $set = "";
                $set = ($periodo1 === '1') ? ",nota_periodo_1=$nota_periodo_1" : $set;
                $set = ($periodo1 === '2') ? ",nota_periodo_2=$nota_periodo_2" : $set;
                $set = ($periodo1 === '3') ? ",nota_periodo_3=$nota_periodo_3" : $set;
                $set = ($periodo1 === '4') ? ",nota_periodo_4=$nota_periodo_4" : $set;
                
                try {
                    $sql = "UPDATE progressus.nota_materia_periodo
              SET nota_final=$nota_final $set  
              WHERE nota_materia_periodo_id=" . $resData1['nota_materia_periodo_id'] . ";
              ";

//                    echo"-->:<pre><br>";
//                    print_r($sql);
//                    echo"</pre><br>";
//                    die();
                    $query = $this->con->prepare($sql);
                    $query->execute();
                } catch (PDOException $e) {
                    $this->con->rollback();
                    echo $e->getMessage();
                    return false;
                }
            } else {

                $nota_periodo_1 = ($periodo1 === '1') ? $nF : 0.0;
                $nota_periodo_2 = ($periodo1 === '2') ? $nF : 0.0;
                $nota_periodo_3 = ($periodo1 === '3') ? $nF : 0.0;
                $nota_periodo_4 = ($periodo1 === '4') ? $nF : 0.0;
                $nota_final = (($nota_periodo_1 * $np1) + ($nota_periodo_2 * $np2) + ($nota_periodo_3 * $np3) + ($nota_periodo_4 * $np4));
                try {
                    $sql = "INSERT INTO progressus.nota_materia_periodo (
                                            materias_id
                                            ,idusuario
                                            ,nota_periodo_1
                                            ,nota_periodo_2
                                            ,nota_periodo_3
                                            ,nota_periodo_4
                                            ,nota_final
                                            )
                                    VALUES (
                                            $materia1
                                            ,$idusuario
                                            ,$nota_periodo_1
                                            ,$nota_periodo_2
                                            ,$nota_periodo_3
                                            ,$nota_periodo_4
                                            ,$nota_final
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