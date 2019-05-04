<?php
// inicia la variable session
session_start();
?>

<?php
// en esta parte se obtiene la ruta absoluta
$nameProyecto = 'Progressus/';
$conflen = strlen('SCRIPT');
$B = substr(__FILE__, 0, strrpos(__FILE__, '/'));
$A = substr($_SERVER['DOCUMENT_ROOT'], strrpos($_SERVER['DOCUMENT_ROOT'], $_SERVER['PHP_SELF']));
$C = substr($B, strlen($A));
$posconf = strlen($C) - $conflen - 1;
$D = substr($C, 1, $posconf);
$host = 'http://' . $_SERVER['SERVER_NAME'] . '/' . $D;
$host = $host . $nameProyecto;

$host = ($host == 'http://localhost/Progressus/') ? $host : "http://localhost/Progressus/";
?>

<!DOCTYPE html>
<html>

    <head>

        <?php
//        if (isset($_SESSION['dataUser'])) {
//            echo"<br><pre> _SESSION:";
//            print_r($_SESSION['dataUser']);
//            echo"</pre>";
//            echo"<br><pre> _SESSION Cargo:";
//            print_r($_SESSION['dataUser']['cargo']);
//            echo"</pre>";
//        } else {
//            echo"No esta declarada";
//        }

        echo'
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="' . $host . 'assets/images/biologia/png/030-theory.png">
    <title>La Biologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- bootstrap css-->
        <link rel="stylesheet" type="text/css" href="' . $host . 'assets/bootstrap4/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="' . $host . 'assets/dataTablesUi/css/jquery-ui.css"/>
        <!-- bootstrap datatable css-->
        <link rel="stylesheet" href="' . $host . 'assets/dataTablesUi/css/dataTables.jqueryui.min.css"/>

        <!-- bootstrap icons -->
        <link rel="stylesheet" href="' . $host . 'assets/font-awesome-4.7.0/css/font-awesome.css">    
        
        <!-- style -->
        <link rel="stylesheet" href="' . $host . 'assets/css/style.css"/>
            


        <!-- css 
        <link href="' . $host . 'assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="' . $host . 'assets/css/style.css" rel="stylesheet" type="text/css" />
        -->

        <!-- DATATABLES
        <link rel="stylesheet" type="text/css" href="' . $host . 'assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css"  href="' . $host . 'assets/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="' . $host . 'assets/datatables/responsive.dataTables.min.css">   
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
            <a class="navbar-brand" href="' . $host . 'index.php">
                <img src="' . $host . 'assets/images/biologia/png/021-laboratory.png" width="35" height="35"
                    class="d-inline-block align-top" alt="">
                Biologia
            </a>
        </nav>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            ';
        if (isset($_SESSION['dataUser'])) {

//            echo"<pre><br>  menuActivo-->";
//            print_r($_SESSION['dataUser']);
//            echo"</pre><br>";

            $menu = $_SESSION['dataUser']['datoMenu'];
            $menuActivo = (isset($_SESSION['dataUser']['menuActivo'])) ? $_SESSION['dataUser']['menuActivo'] : "";


            if (!empty($menu)) {
                $subMenu = $_SESSION['dataUser']['datoSubMenu'];
                foreach ($menu as $key => $value) {


                    $Active = ($value['menu_id'] == $menuActivo) ? "active" : "";
                    $submenuSiNo = (bool) $value['sw_submenu'];

                    if ($submenuSiNo == true) {
                        echo'
                            <li class="nav-item dropdown">
                                <a id="a_' . $value["menu_id"] . '" name="a_' . $value["menu_id"] . '" class="nav-link dropdown-toggle" href="' . $host . $value["url"] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ' . $value["descrpcion"] . '
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            ';
                        foreach ($subMenu as $keySub => $valueSub) {
//                    echo"<pre><br>  menuActivo-->";
//                    print_r($valueSub);
//                    echo"</pre><br>";
                            if ($value['menu_id'] == $valueSub['menu_id']) {
                                echo'
                                    <a class="dropdown-item" href="#">'.$valueSub['descripcion'].'</a>
                                ';
                            }
                        }

                        echo'
                                </div>
                            </li> 
                            ';
                    } else {
                        echo'
                            <li class="nav-item ' . $Active . '">
                                <a id="a_' . $value["menu_id"] . '" name="a_' . $value["menu_id"] . '" class="nav-link myClass" href="' . $host . $value["url"] . '">' . $value["descrpcion"] . '</a>
                            </li>
                            ';
                    }
                }
            }
        }

        echo'
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
                
                

            </ul>

        </div>

        <!-- Image and text -->
        <nav class="navbar navbar-dark bg-dark
            <a class="navbar-brand" href="index.php">
                <img src="' . $host . 'assets/images/logocol.png" width="35" height="35" class="d-inline-block align-top" alt="">
            </a>
            &nbsp; 
            &nbsp; 
            &nbsp;
        ';
        if (!isset($_SESSION['dataUser'])) {
            echo'     
                <img src="' . $host . 'assets/images/login.png" width="35" height="35" class="d-inline-block align-top" alt="" title="Login" data-toggle="modal" data-target="#loginModal" onclick="clearLogin();">
            ';
        } else {
            echo' 
                <div>
                    <label style="color: ghostwhite;">
                        <img src="' . $host . 'assets/images/logueado.png" width="35" height="35" class="d-inline-block align-top" alt="" title="Cerrar Sesion" onclick="loginclose()">
                        ' . $_SESSION['dataUser']['login'] . '
                    </label>
                </div>
            ';
        }

        echo'     
        </nav>
    </nav>
    ';
        ?>  

    </header>

    <?php
    require 'login.php';
    ?>