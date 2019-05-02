<?php

require_once "../modelo/usuario.php";

$usuarioSql = new UsuarioSql();

switch ($_GET["op"]) {
    case 'listar':
        $rspta = $usuarioSql->allUser();
        echo json_encode(array('data' => $rspta));
        break;
    
    case'selectCargo':
        $rspta = $usuarioSql->datosSelectCargo();
        echo json_encode(array('data' => $rspta));
        break;
    
    case 'insert':

        $datos = $_REQUEST;


        if (empty($datos['idusuario'])) {
            $rsptaLogin = $usuarioSql->existsLogin($datos);
            $rsptaTipoDocume = $usuarioSql->existsTipoDocume($datos);
            $rsptaEmail = $usuarioSql->existsEmail($datos);

            if ($rsptaLogin > 0) {
                $res['status'] = false;
                $res['message'] = "Este login ya esta registrado, favor digitar login valido.";
            } elseif ($rsptaTipoDocume > 0) {
                $res['status'] = false;
                $res['message'] = "Este documento ya esta registrado, favor digitar documento valido.";
            } elseif ($rsptaEmail > 0) {
                $res['status'] = false;
                $res['message'] = "Este correo ya esta registrado, favor digitar correo valido.";
            } else {
                $rsptaInsertUser = $usuarioSql->InsertUser($datos);
                $res['status'] = $rsptaInsertUser;
                $res['message'] = ($rsptaInsertUser == true) ? "Datos registrados satisfactoriamente." : "Error al registrar los datos.";
            }
        } else {
            $updateUser = $usuarioSql->updateUser($datos);
            $res['status'] = $updateUser;
            $res['message'] = ($updateUser == true) ? "Datos actualizados satisfactoriamente." : "Error al actualizar los datos.";

        }

        echo json_encode($res);
        break;

    case'delete':
        $datos = $_REQUEST;

        $rspta = $usuarioSql->deleteUsuario($datos);

        $res['status'] = $rspta;
        $res['message'] = ($rspta == true) ? "Se elimino satisfactoriamente el usuario" : "Error eliminando el usuario";

        echo json_encode($res);
        break;

    case'update':
        $datos = $_REQUEST;
        $rspta = $usuarioSql->datosUserEdit($datos);
        echo json_encode(array('data' => $rspta));
        break;
    
}
?>