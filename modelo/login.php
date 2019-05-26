<?php

include_once('../config/db.php');

class LoginSql {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    public function __destruct() {
        $this->con->close_con();
    }    
    
    public function login($datos) {
        try {
            $sql = "SELECT COUNT(*) AS reslt FROM usuario WHERE login='$datos[login0]' AND clave='$datos[clave0]' AND condicion=1;";
            $query = $this->con->prepare($sql);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return (int) $res['reslt'];
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function datoUser($datos) {
        try {
            $sql = "select
                            u.*, p.*
                    from
                            usuario as u
                            inner join usuario_perfil as up on (u.idusuario=up.idusuario)
                            inner join perfil as p on (up.perfil_id=p.perfil_id)
                    where
                            login = '$datos[login0]'
                            and clave = '$datos[clave0]';";      
            
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }    
    public function datoMenu($datos) {
        try {
            $sql = "SELECT p.*, m.*
                        FROM usuario AS u
                        INNER JOIN usuario_perfil AS up ON (u.idusuario = up.idusuario)
                        INNER JOIN perfil AS p ON (up.perfil_id = p.perfil_id)
                        INNER JOIN perfil_menu AS pm ON (p.perfil_id = pm.perfil_id)
                        INNER JOIN menu AS m ON (pm.menu_id = m.menu_id)
                        WHERE u.idusuario = $datos[idusuario]
                        AND m.sw_estado = 1
                        ORDER BY m.orden;";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }    
    public function datoSubMenu($datos) {
        
        try {
            $sql = "SELECT m.menu_id
                            ,m.descrpcion
                            ,s.*
                    FROM usuario AS u
                    INNER JOIN usuario_perfil AS up ON (u.idusuario = up.idusuario)
                    INNER JOIN perfil AS p ON (up.perfil_id = p.perfil_id)
                    INNER JOIN perfil_menu AS pm ON (p.perfil_id = pm.perfil_id)
                    INNER JOIN menu AS m ON (pm.menu_id = m.menu_id)
                    INNER JOIN menu_submenu AS ms ON (
                                    m.menu_id = ms.menu_id
                                    AND p.perfil_id = ms.perfil_id
                                    )
                    INNER JOIN submenu AS s ON (ms.submenu_id = s.submenu_id)
                    WHERE u.idusuario = $datos[idusuario]
                            AND m.sw_estado = 1
                    ORDER BY 3;";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        
    }    
    
    

}

?>