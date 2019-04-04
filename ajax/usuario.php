<?php
require_once "../modelo/usuario.php";

$usuarioSql = new UsuarioSql(); 

switch ($_GET["op"]) {
    case 'listar':

    
    $rspta = $usuarioSql->allUser();
    
    echo json_encode(array('data'=> $rspta));
    break;
    case 'insert':
    
    $datos = $_REQUEST;
    
    
    $rsptaLogin = $usuarioSql->existsLogin($datos);
    $rsptaTipoDocume = $usuarioSql->existsTipoDocume($datos);
    $rsptaEmail = $usuarioSql->existsEmail($datos);

    if($rsptaLogin > 0){
        $res['status']=false;
        $res['message']="Este login ya esta registrado, favor digitar login valido.";
    }elseif($rsptaTipoDocume > 0){
        $res['status']=false;
        $res['message']="Este documento ya esta registrado, favor digitar documento valido.";
    }elseif($rsptaEmail > 0){
        $res['status']=false;
        $res['message']="Este correo ya esta registrado, favor digitar correo valido.";
    }else{
        $rsptaInsertUser = $usuarioSql->InsertUser($datos);
        $res['status']=$rsptaInsertUser;
        $res['message']=($rsptaInsertUser)?"Datos registrados satisfactoriamente.":"Error al registrar los datos.";            
    }


    // echo"<pre><br> rspta:\n";
    // print_r($res);
    // echo"</pre><br> :\n";
    // DIE(); 

    // return true;
    echo json_encode($res);
    
    // echo"<pre><br> _REQUEST:\n";
    // print_r($_REQUEST);
    // echo"</pre><br> :\n";
    // echo"<pre><br> _POST:\n";
    // print_r($_POST);
    // echo"</pre><br> :\n";
    // echo"<pre><br> _GET:\n";
    // print_r($_GET);
    // echo"</pre><br> :\n";
    // DIE(); 

    
    
    // echo"<pre><br> rspta:";
    // var_dump($rspta);
    // echo"</pre><br> :";
    // DIE();    

        //$rspta = $usuarioSql->allUser();
        
        //echo json_encode(array('data'=> $rspta));
    break;
    
}


?>