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
            $datoMenu = $loginSql->datoMenu($datoUser);
            $datoSubMenu = $loginSql->datoSubMenu($datoUser);
            $_SESSION['dataUser'] = $datoUser;
            $_SESSION['dataUser']['datoMenu'] = $datoMenu;
            $_SESSION['dataUser']['datoSubMenu'] = $datoSubMenu;

            $res['status'] = true;
            $res['message'] = "El usuario ingreso satisfactoriamente.";
        } else {
            $res['status'] = false;
            $res['message'] = "Los datos ingresados no son validos.";
        }

        echo json_encode($res);
        break;
        
    case 'menuActivo':
        $datos = $_REQUEST;
//echo"<pre><br>sql:";
//print_r($datos);
//echo"</pre><br>";  
//die();
        $_SESSION['dataUser']['menuActivo'] = $datos['id'];

//        echo json_encode($res);
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