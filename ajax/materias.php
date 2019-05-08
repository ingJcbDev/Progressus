<?php

require_once "../modelo/materias.php";

$materiasSql = new MateriasSql();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $materiasSql->allMaterias($datos);
        echo json_encode(array('data' => $rspta));
        break;
    
//echo"<pre><br>sql:";
//print_r($datos);
//echo"</pre><br>";  
//die();        
     
}
?>