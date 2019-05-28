<?php

include_once('../config/db.php');

class PeriodoSql {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    public function __destruct() {
        $this->con->close_con();
    }

    public function allPeriodo($datos) {
        try {
            $sql='
                SELECT p.*
                        ,m.materias_id
                        ,m.descripcion AS masteria
                FROM submenu_materias AS sm
                INNER JOIN materias AS m ON (sm.materias_id = m.materias_id)
                INNER JOIN materias_periodos AS mr ON (mr.materias_id = m.materias_id)
                INNER JOIN periodo AS p ON (p.periodo_id = mr.periodo_id)
                WHERE m.materias_id = '.$datos['materia'].';';
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
    
    public function cantidadPreguntas() {
        try {
            $sql='select valor from system_variables where descripcion = "cantidadPreguntas";';
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }    
    
//echo"<pre><br>sql:";
//print_r($sql);
//echo"</pre><br>";         
 
}

//fin de la clase
?>