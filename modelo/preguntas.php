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

    public function allPeriodo($datos) {
        try {
            $sql='select
                            m.descripcion as materia, p.descripcion as periodo
                    from
                            materias m
                    inner join periodo p on
                            (m.materias_id = p.materias_id)
                    where
                            m.materias_id = '.$datos['materia'].'
                            and p.periodo_id = '.$datos['periodo'].';';
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