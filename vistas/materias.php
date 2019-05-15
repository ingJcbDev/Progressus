<?php
require 'structure/header.php';
?>


<?php
        echo"<pre><br>  menuActivo-->";
        print_r($_SESSION['dataUser']['M']);
        echo"</pre><br>";
        
echo'<input type="hidden" name="menuActivo" id="menuActivo" value="'.$_SESSION['dataUser']['M']['menuActivo'].'" />';
echo'<input type="hidden" name="subMenuActivo" id="subMenuActivo" value="'.$_SESSION['dataUser']['M']['subMenuActivo'].'" />';
echo'<input type="hidden" name="ruta" id="ruta" value="'.$host.'" />';
        
?>
<div class="container box">
    <h1 align="center">Materias</h1>
        <div id="listasMaterias" name="listasMaterias"></div>
</div>

<?php





?>




<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/materias.js" ></script>