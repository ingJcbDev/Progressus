<?php
include_once('../config/db.php');

// class model_user {
    $statement = $connection->prepare("SELECT * FROM users");
	$statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(array('data'=> $result));
// }

    

?>    