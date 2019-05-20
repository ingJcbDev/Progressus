<?php

require_once "../modelo/preguntas.php";

/* inicia la session */
session_start();

$preguntas = new Preguntas();

switch ($_GET["op"]) {
    case 'loadData':
        $datos = $_REQUEST;
        $rspta = $preguntas->loadPreguntas($datos);
        echo json_encode(array('data' => $rspta));
        break;
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $preguntas->allPeriodo($datos);
        echo json_encode(array('data' => $rspta));
        break;
    case 'updateTema':
        $datos = $_REQUEST;
        $rspta = $preguntas->updateTema($datos);
        echo json_encode(array('status' => $rspta));
        break;
    case 'insert':
        $datos = $_REQUEST;

        $rspta = $preguntas->insertPregunta($datos);

        if($rspta==true){
        $status=true;
        $message="Datos insertados correctamente"; 
        $data = array('status' => $status, 'message' => $message);
        echo json_encode($data);    
        }else{
        $status=false;
        $message="Error al insertar los datos"; 
        $data = array('status' => $status, 'message' => $message);
        echo json_encode($data);    
        }
        
//echo"<pre><br>datos:";
//print_r($rspta);
//echo"</pre><br>";  
//echo"<pre><br>data:";
//print_r($data);
//echo"</pre><br>";  
//die('--------------------------->');        

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