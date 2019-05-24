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
    case 'temaRegistrado':
        $datos = $_REQUEST;
        $idusuario=$_SESSION['dataUser']['idusuario'];
        $rspta = $respuestas->temaRegistrado($datos, $idusuario);
        $rspta = utf8_string_array_encode($rspta);
        echo json_encode($rspta);
        break;
    case 'calificarRespuestas':
        $datos = $_REQUEST;

        $n = 5.0;
        $can = 0;
        $valPreg = 0;
        $nDef = 0;
        $idusuario=$_SESSION['dataUser']['idusuario'];
        foreach ($datos as $key => $value) {
            $keyR = explode('_', $key);
            if ($keyR['0'] == 'radioRespuestas') {
                $can++;
            }
        }
        $valPreg = $n / $can;

        foreach ($datos as $key => $value) {
            $valueR = explode('_', $value);
            if ($valueR['0'] === "radioRespuesta") {
                if ($valueR['3'] === '1') {
                    $nDef = $valPreg + $nDef;
                }
            }
        }
        $nDef = number_format($nDef, 1, '.', '');

        $rspta = $respuestas->insertNotas($datos, $nDef, $idusuario);
        
        $res['status'] = $rspta;
        $res['calificacion'] = $nDef;
        $res['message'] = ($rspta == true) ? "Datos actualizados satisfactoriamente." : "Error al actualizar los datos.";  
       
//        echo"-->:<pre><br>";
//        var_dump($res);
//        echo"</pre><br>";
//        die();

        echo json_encode($res);
        break;
        
}

function utf8_string_array_encode(&$array) {
    $func = function(&$value, &$key) {
        if (is_string($value)) {
            $value = utf8_encode($value);
        }
        if (is_string($key)) {
            $key = utf8_encode($key);
        }
        if (is_array($value)) {
            utf8_string_array_encode($value);
        }
    };
    array_walk($array, $func);
    return $array;
}

?>