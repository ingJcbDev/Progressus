<?php
include_once('../config/db.php');

// echo"<pre><br> _GET:\n";
// print_r($_GET);
// echo"</pre><br> :\n";
// echo"<pre><br> _POST:\n";
// print_r($_POST);
// echo"</pre><br> :\n";
// echo"<pre><br> _REQUEST:\n";
// print_r($_REQUEST);
// echo"</pre><br> :\n";
// DIE();

switch ($_GET["op"]) {
    case 'listar':
        $sql="SELECT * FROM usuario;";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(array('data'=> $result));
    break;
    
}


    

?>