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
//echo'<input type="hidden" name="subMenuActivo" id="subMenuActivo" value="' . $_SESSION['dataUser']['M']['subMenuActivo'] . '" />';
//echo'<input type="hidden" name="materia" id="materia" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
//echo'<input type="hidden" name="periodo" id="periodo" value="' . $_SESSION['dataUser']['M']['periodo'] . '" />';
echo'<input type="hidden" name="perfil" id="perfil" value="' . $_SESSION['dataUser']['perfil_id'] . '" />';
echo'<input type="hidden" name="ruta" id="ruta" value="' . $host . '" />';
?>


<div>
    <p><embed src="../assets/juegos/manipulac_genetica.swf" width="100%" height="618px"></p>
</div>
<div>
    <p><embed src="../assets/juegos/beneficios.swf" width="100%" height="618px"></p>
</div>
<div>
    <p><embed src="../assets/juegos/animales_transgenicos.swf" width="100%" height="618px"></p>
</div>
<div>
    <p><embed src="../assets/juegos/aceite.swf" width="100%" height="618px"></p>
</div>
<div>
    <p><embed src="../assets/juegos_app/ciclo_agua.swf" width="100%" height="618px"></p>
</div>

<div>
    <p><embed src="../assets/juegos_app/oceanos.swf" width="100%" height="618px"></p>
</div>

<?php
require 'structure/footer.php';
?>

<!--<script type="text/javascript" src="scripts/preguntas.js" ></script>-->


