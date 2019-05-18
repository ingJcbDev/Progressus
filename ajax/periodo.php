<?php

require_once "../modelo/periodo.php";

/* inicia la session */
session_start();

$periodoSql = new PeriodoSql();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $periodoSql->allPeriodo($datos);
        $cantidadPreguntas = $periodoSql->cantidadPreguntas();
        $_SESSION['cantidadPreguntas'] = $cantidadPreguntas['valor'];
        echo json_encode(array('data' => $rspta));
        break;
    
//echo"<pre><br>sql:";
//print_r($_SESSION['cantidadPreguntas']);
//echo"</pre><br>";  
//die();        
     
}
?>