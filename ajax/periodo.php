<?php

require_once "../modelo/periodo.php";

$periodoSql = new PeriodoSql();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $periodoSql->allPeriodo($datos);
        echo json_encode(array('data' => $rspta));
        break;
    
//echo"<pre><br>sql:";
//print_r($datos);
//echo"</pre><br>";  
//die();        
     
}
?>