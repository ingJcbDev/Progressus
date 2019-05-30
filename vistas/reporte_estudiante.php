<?php
require 'structure/header.php';
?>


<?php
//echo"<pre><br>  menuActivo-->";
//print_r($_SESSION['dataUser']['M']);
//echo"</pre><br>";
//echo"<pre><br>  -->";
//print_r($_SESSION['cantidadPreguntas']);
//echo"</pre><br>";

echo'<input type="hidden" name="menuActivo" id="menuActivo" value="' . $_SESSION['dataUser']['M']['menuActivo'] . '" />';
echo'<input type="hidden" name="subMenuActivo" id="subMenuActivo" value="' . $_SESSION['dataUser']['M']['subMenuActivo'] . '" />';
//echo'<input type="hidden" name="materia" id="materia" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
//echo'<input type="hidden" name="periodo" id="periodo" value="' . $_SESSION['dataUser']['M']['periodo'] . '" />';
echo'<input type="hidden" name="perfil" id="perfil" value="' . $_SESSION['dataUser']['perfil_id'] . '" />';
echo'<input type="hidden" name="ruta" id="ruta" value="' . $host . '" />';
?>

<div class="container box">
    <div class="card">
        <div class="card-header">
            <center><h5><div id="titulo" name="titulo">Reporte Estudiante</div></h5></center>
        </div>
        <div class="card-body">
            <br>
            <table id="reporteEstudiantes" name="reporteEstudiantes" class="table display" style='width:100%; font-size:11px;'>
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Periodo 1</th>
                        <th>Periodo 2</th>
                        <th>Periodo 3</th>
                        <th>Periodo 4</th>
                        <th>Nota Final</th>
                    </tr>
                </thead>
            </table>

        </div>
    <br>
    </div>


</div>




<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/reporte_estudiante.js"></script>


