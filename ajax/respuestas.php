<?php

require_once "../modelo/respuestas.php";

/* inicia la session */
session_start();

$respuestas = new Respuestas();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
//echo"<pre><br>sql:";
//print_r($datos);
//echo"</pre><br>";  
//die();        
        $rspta = $respuestas->loadPreguntas($datos);
        echo json_encode(array('data' => $rspta));
        break;
    
     
}
?>