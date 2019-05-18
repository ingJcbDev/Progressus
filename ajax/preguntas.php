<?php

require_once "../modelo/preguntas.php";

$preguntas = new Preguntas();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $preguntas->allPeriodo($datos);
        echo json_encode(array('data' => $rspta));
        break;
    case 'insert':
        $datos = $_REQUEST;

        $rspta = $preguntas->allPeriodo($datos);

echo"<pre><br>datos:";
print_r($rspta);
echo"</pre><br>";  
die();        














        
//        $rspta = $preguntas->allPeriodo($datos);
//        echo json_encode(array('data' => $rspta));
        break;
    
    case 'upload':
        $datos = $_REQUEST;
//        $rspta = $preguntas->allPeriodo($datos);




        if (is_array($_FILES) && count($_FILES) > 0) {
            if (($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/gif")) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES['file']['name'])) {
                    //more code here...
                    echo "images/" . $_FILES['file']['name'];
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }


        echo json_encode(array('data' => $rspta));
        break;

}
?>