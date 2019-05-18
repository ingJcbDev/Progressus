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

    
    
/*    
    
$this->conn->beginTransaction();
            
        try {
            $sql="SELECT nextval('hc_os_solicitudes_datos_acto_qx_acto_qx_id_seq');";
            $resultado = $this->conn->prepare($sql);
            $resultado->execute();
            $res = $resultado->fetch(PDO::FETCH_ASSOC);
            $acto_qx_id = $res['nextval'];
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo $e->getMessage();
            return false;
        }
        try {
              $sql = '';
              $sql = "INSERT INTO hc_os_solicitudes_datos_acto_qx (
              nivel_autorizacion
              ,fecha_tentativa_cirugia
              ,acto_qx_id
              ,evolucion_id
              )
              VALUES (
              NULL
              ,NULL
              ,'$acto_qx_id'
              ,NULL
              );
              ";
            $resultado = $this->conn->prepare($sql);
            $resultado->execute();
            $res = $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->conn->rollback();
            echo $e->getMessage();
            return false;
        }
        
              
              
              
        $this->conn->commit();
        
        return $acto_qx_id;         
    
    */
    
    
//echo"<pre><br>sql:";
//print_r($sql);
//echo"</pre><br>"; 
//die();
 
}

//fin de la clase
?>