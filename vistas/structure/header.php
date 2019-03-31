<?php
//   echo getcwd() . ""."\n <br>";
// //   echo __FILE__ . "\n <br>";
// //   echo RAIZ_APLICACION;
//   echo "<br>";
// //  echo  $root = dirname(__FILE__);
// // echo "<br>";
// // $root= "Progressus/new";
// // $root = $_SERVER["DOCUMENT_ROOT"];
// $root = "xampp/htdocs/Progressus/new/";
// define('RAIZ_APLICACION', $root);
// echo RAIZ_APLICACION;
// echo"<br>";
// echo getcwd();
// echo"<br>";
// echo $_SERVER['SCRIPT_FILENAME'];
?>

<?php
// en esta parte se obtiene la ruta absoluta
$conflen=strlen('SCRIPT');
$B=substr(__FILE__,0,strrpos(__FILE__,'/'));
$A=substr($_SERVER['DOCUMENT_ROOT'], strrpos($_SERVER['DOCUMENT_ROOT'], $_SERVER['PHP_SELF']));
$C=substr($B,strlen($A));
$posconf=strlen($C)-$conflen-1;
$D=substr($C,1,$posconf);
echo $host='http://'.$_SERVER['SERVER_NAME'].'/'.$D;

?>


<!DOCTYPE html>
<html>

<head>

<?php 
    echo'
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="'.$host.'Progressus/assets/images/biologia/png/030-theory.png">
    <title>La Biologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- css -->
        <link href="'.$host.'Progressus/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="'.$host.'Progressus/assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- DATATABLES -->
        <link rel="stylesheet" type="text/css" href="'.$host.'Progressus/assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css"  href="'.$host.'Progressus/assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="'.$host.'Progressus/assets/datatables/responsive.dataTables.min.css">     
    '; 
?>
</head>

<header>

<?php 
    echo'
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="'.$host.'Progressus/assets/images/biologia/png/021-laboratory.png" width="35" height="35"
                    class="d-inline-block align-top" alt="">
                Biologia
            </a>
        </nav>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="vistas/categoria.php">Categoria</a>
                </li>
                
                <!-- 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                 -->
                <!-- 
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                 -->
                <!-- 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> 
                -->

            </ul>

        </div>

        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="'.$host.'Progressus/assets/images/logocol.png" width="35" height="35" class="d-inline-block align-top" alt="">
            </a>
        </nav>

    </nav>
    '; 
?>    
</header>