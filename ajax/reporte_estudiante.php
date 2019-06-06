<?php

require_once "../modelo/reporte_estudiante.php";

/* inicia la session */
session_start();

$report = new Reporte_estudiantes();

switch ($_GET["op"]) {
    case 'loadData':
        $datos = $_REQUEST;
        $idusuario = $_SESSION['dataUser']['idusuario'];
        $rspta = $report->allNotas($datos, $idusuario);

//        $rspta = utf8_string_array_encode($rspta);
        echo json_encode(array('data' => $rspta));
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