<?php
require_once "../modelo/usuario.php";

$usuarioSql = new UsuarioSql(); 

switch ($_GET["op"]) {
    case 'listar':

    
    $rspta = $usuarioSql->allUser();
    
    echo json_encode(array('data'=> $rspta));
    break;
    case 'insert':
    
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

    $datos = $_REQUEST;
    
    $rspta = $usuarioSql->InsertUser($datos);
    
    // echo"<pre><br> rspta:";
    // var_dump($rspta);
    // echo"</pre><br> :";
    // DIE();    

        //$rspta = $usuarioSql->allUser();
        
        //echo json_encode(array('data'=> $rspta));
    break;
    
}


?>