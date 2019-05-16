<?php
require 'structure/header.php';
?>


<?php
//echo"<pre><br>  menuActivo-->";
//print_r($_SESSION['dataUser']['M']);
//echo"</pre><br>";
//echo"<pre><br>  -->";
//print_r($_SESSION['dataUser']);
//echo"</pre><br>";

echo'<input type="hidden" name="menuActivo" id="menuActivo" value="' . $_SESSION['dataUser']['M']['menuActivo'] . '" />';
echo'<input type="hidden" name="subMenuActivo" id="subMenuActivo" value="' . $_SESSION['dataUser']['M']['subMenuActivo'] . '" />';
echo'<input type="hidden" name="materia" id="materia" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
echo'<input type="hidden" name="periodo" id="periodo" value="' . $_SESSION['dataUser']['M']['periodo'] . '" />';
echo'<input type="hidden" name="perfil" id="perfil" value="' . $_SESSION['dataUser']['perfil_id'] . '" />';
echo'<input type="hidden" name="ruta" id="ruta" value="' . $host . '" />';
?>

<div class="container box">


    <div class="card">
        <div class="card-header">
            <center><h5><div id="titulo" name="titulo"></div></h5></center>
        </div>
        <div class="card-body">

            <form action="/action_page.php">

                <div class="form-group">
                    
<!--<div class="row">
  <div class="col-3">col-3</div>
  <div class="col-6">
                    
                    <div class="card" style="width: 18rem;">-->
<?php                        
//         echo'<img class="card-img-top" src="'.$host.'assets/images_load/default-avatar.png">';
?>                        
<!--                        <div class="card-body">
                            <h5 class="card-title">Sube una imagen</h5>
                            <p class="card-text">La imagen puede ser en formato .jpg, o .png.</p>
                            <div class="form-group">
                                <label for="image">Nueva imagen</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <input type="button" class="btn btn-primary upload" value="Subir">
                        </div>
                    </div>                    

      
</div>
  <div class="col-3">col-3</div>
</div>                          -->
      
                    <label for="temaTextarea"><b>Tema:</b></label>
                    <textarea class="form-control" id="temaTextarea" name="temaTextarea" rows="5" maxlength="1000024"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>


</div>





<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/preguntas.js" ></script>


