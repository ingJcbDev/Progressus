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


        foreach ($rspta as $key => $value) {
//            echo"<pre><br>sql:*------------------------------------->";
//            print_r($value);
//            echo"</pre><br>";

            foreach ($rspta as $key1 => $value1) {

                if ($value['materias_id'] === $value['materias_id']) {
                    $respArray['materias_id'] = $value['materias_id'];
                    $respArray['materia'] = $value['materia'];
                }
//                echo"<pre><br>:";
//                print_r($value1);
//                echo"</pre><br>*------------------------------------->";
            }
            $respArray1[] = $respArray;
        }

        echo"<pre><br>respArray/////////////////////";
        print_r($respArray1);
        echo"</pre><br>";
        echo"<pre><br>sql:*------------------------------------->";
        print_r($rspta);
        echo"</pre><br>";


        die();
        $rspta = utf8_string_array_encode($rspta);
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