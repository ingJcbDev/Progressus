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
            $sql='select
                            p.*, m.materias_id,m.descripcion as masteria
                    from
                            submenu_materias as sm
                    inner join materias as m on
                            (sm.materias_id = m.materias_id)
                    inner join periodo as p on
                            (sm.materias_id=p.materias_id)
                    where
                            m.materias_id = '.$datos['materia'].';';
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
 
}

//fin de la clase
?>