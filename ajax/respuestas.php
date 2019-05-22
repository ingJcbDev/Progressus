<?php

require_once "../modelo/respuestas.php";

/* inicia la session */
session_start();

$respuestas = new Respuestas();

switch ($_GET["op"]) {
    case 'loadAll':
        $datos = $_REQUEST;
        $rspta = $respuestas->loadPreguntas($datos);
        echo json_encode(array('data' => $rspta));
        break;
    case 'loadTema':
        $datos = $_REQUEST;
        $rspta = $respuestas->loadTema($datos);
        
        $rspta = utf8_string_array_encode($rspta);
        echo json_encode(array('data' => $rspta));
        break;
    case 'loadPreguntas':
        $datos = $_REQUEST;
        $rspta = $respuestas->loadPreguntass($datos);
        $rspta = utf8_string_array_encode($rspta);
        echo json_encode(array('data' => $rspta));
        break;
    case 'loadRespuestas':
        $datos = $_REQUEST;
        $rspta = $respuestas->loadRespuestas($datos);
        $rspta = utf8_string_array_encode($rspta);
        echo json_encode(array('data' => $rspta));
        break;
    
     
//echo"<pre><br>sql:";
//print_r($rspta);
//echo"</pre><br>";  
    
}

function utf8_string_array_encode(&$array){
    $func = function(&$value,&$key){
        if(is_string($value)){
            $value = utf8_encode($value);
        } 
        if(is_string($key)){
            $key = utf8_encode($key);
        }
        if(is_array($value)){
            utf8_string_array_encode($value);
        }
    };
    array_walk($array,$func);
    return $array;
}


?>