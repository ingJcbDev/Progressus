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

    
        <!--<li class="list-group-item disabled">Cras justo odio</li>-->
        <!--<li class="list-group-item text_center">Dapibus ac facilisis in</li>-->
        <div id="listasMaterias" id="listasMaterias"></div>
        

</div>






<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/materias.js" ></script>