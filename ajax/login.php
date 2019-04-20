<?php

require_once "../modelo/login.php";

$loginSql = new LoginSql();

/* inicia la session */
session_start();

switch ($_GET["op"]) {

    case 'login':

        $datos = $_REQUEST;

        $restLogin = $loginSql->login($datos);

        if ($restLogin > 0) {
            $datoUser = $loginSql->datoUser($datos);
            $_SESSION['dataUser'] = $datoUser;

            $res['status'] = true;
            $res['message'] = "El usuario ingreso satisfactoriamente.";
        } else {
            $res['status'] = false;
            $res['message'] = "Los datos ingresados no son validos.";
        }

        echo json_encode($res);
        break;
        
    case 'loginClose':
        
        /*limpiar session*/
//        session_unset();
        session_destroy(); 

        $res['status'] = true;
        $res['message'] = "Sesion cerrada.";

        echo json_encode($res);
        break;
}
?>