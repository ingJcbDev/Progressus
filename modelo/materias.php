<?php

include_once('../config/db.php');

class MateriasSql {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    public function __destruct() {
        $this->con->close_con();
    }

    public function allMaterias($datos) {
        try {
            $sql='SELECT m.* 
                    FROM submenu_materias as sm
                    INNER JOIN materias AS m ON (sm.materias_id=m.materias_id)
                    WHERE sm.submenu_id = '.$datos['submenu'].';';
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