<?php
// en esta parte se obtiene la ruta absoluta
$nameProyecto='Progressus/';
$conflen=strlen('SCRIPT');
$B=substr(__FILE__,0,strrpos(__FILE__,'/'));
$A=substr($_SERVER['DOCUMENT_ROOT'], strrpos($_SERVER['DOCUMENT_ROOT'], $_SERVER['PHP_SELF']));
$C=substr($B,strlen($A));
$posconf=strlen($C)-$conflen-1;
$D=substr($C,1,$posconf);
$host='http://'.$_SERVER['SERVER_NAME'].'/'.$D;
$host=$host.$nameProyecto;
$host=($host=='http://localhost/Progressus/')?$host:"http://localhost/Progressus/";


?>

<!DOCTYPE html>
<html>

<head>

<?php 
    echo'
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="'.$host.'assets/images/biologia/png/030-theory.png">
    <title>La Biologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- bootstrap css-->
        <link rel="stylesheet" type="text/css" href="'.$host.'assets/bootstrap4/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="'.$host.'assets/dataTablesUi/css/jquery-ui.css"/>
        <!-- bootstrap datatable css-->
        <link rel="stylesheet" href="'.$host.'assets/dataTablesUi/css/dataTables.jqueryui.min.css"/>
        <!-- bootstrap icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- style -->
        <link rel="stylesheet" href="'.$host.'assets/css/style.css"/>

        <!-- css 
        <link href="'.$host.'assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="'.$host.'assets/css/style.css" rel="stylesheet" type="text/css" />
        -->

        <!-- DATATABLES
        <link rel="stylesheet" type="text/css" href="'.$host.'assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css"  href="'.$host.'assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="'.$host.'assets/datatables/responsive.dataTables.min.css">   
        -->  
    '; 
?>
</head>

<header>

<?php 
    echo'
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="'.$host.'index.php">
                <img src="'.$host.'assets/images/biologia/png/021-laboratory.png" width="35" height="35"
                    class="d-inline-block align-top" alt="">
                Biologia
            </a>
        </nav>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="'.$host.'index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="'.$host.'vistas/usuario.php">Usuario</a>
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
        <nav class="navbar navbar-dark bg-dark
<!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
            </button>  -->
            <a class="navbar-brand" href="index.php">
                <img src="'.$host.'assets/images/logocol.png" width="35" height="35" class="d-inline-block align-top" alt="">
            </a>
            &nbsp; 
            &nbsp; 
            &nbsp; 
            <img src="'.$host.'assets/images/login.png" width="35" height="35" class="d-inline-block align-top" alt="" title="Login" data-toggle="modal" data-target="#loginModal">
        </nav>

    </nav>
    '; 
?>    
</header>
<?php
require 'login.php';
?>