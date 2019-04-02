<?php
require_once "../modelo/usuario.php";

$usuarioSql = new UsuarioSql(); 

switch ($_GET["op"]) {
    case 'listar':
// echo"<pre><br> _REQUEST:\n";
// print_r($_REQUEST);
// echo"</pre><br> :\n";
// DIE();    
        $rspta = $usuarioSql->allUser();
        
        echo json_encode(array('data'=> $rspta));
    break;
    
}


?>