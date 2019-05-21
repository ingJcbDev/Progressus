<?php
require 'structure/header.php';
?>


<?php
//echo"<pre><br>  menuActivo-->";
//print_r($_SESSION['dataUser']['M']['menuActivo']);
//echo"</pre><br>";
//echo"<pre><br>  -->";
//print_r($_SESSION['dataUser']);
//echo"</pre><br>";

echo'<input type="hidden" name="menuActivo" id="menuActivo" value="' . $_SESSION['dataUser']['M']['menuActivo'] . '" />';
echo'<input type="hidden" name="subMenuActivo" id="subMenuActivo" value="' . $_SESSION['dataUser']['M']['subMenuActivo'] . '" />';
echo'<input type="hidden" name="materia" id="materia" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
echo'<input type="hidden" name="perfil" id="perfil" value="' . $_SESSION['dataUser']['perfil_id'] . '" />';
echo'<input type="hidden" name="ruta" id="ruta" value="' . $host . '" />';
?>

<div class="container box">
    <!--<h1 align="center">Periodos</h1>-->

    <div id="profesor" name="profesor" class="card" style="display: none;">
        <div class="card-header">
            <h5 id="titleMateria" name="titleMateria"></h5>
        </div>
        <div class="card-body">

            <div id="listasPeriodos" name="listasPeriodos"></div>

        </div>
    </div>
    
    <div id="estudiante" name="estudiante" class="card" style="display: none;">
        <div class="card-header">
            <h5 id="titleMateria1" name="titleMateria1"></h5>
        </div>
        <div class="card-body">

            <div id="listasPeriodos1" name="listasPeriodos1"></div>

        </div>
    </div>    
    
    <br>
    <div style="text-align: center;">

        <?php
        echo'
               <a href="' . $host . 'vistas/materias.php" class="btn btn-light"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
            ';
        ?>
    </div>

</div>






<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/periodo.js" ></script>


