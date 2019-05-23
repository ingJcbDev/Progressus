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
    <!--<h1 align="center">Periodos</h1>-->

    <div id="listaTemas" name="listaTemas" class="card" style="display: block;">
        <div class="card-header">
            <center><h5 id="titleTema" name="titleTema"></h5></center>
        </div>
        <div class="card-body">

            <div id="listasTema" name="listasTema"></div>

        </div>
    </div>


    <br>
    <div style="text-align: center;">

        <?php
        echo'
               <a href="' . $host . 'vistas/periodo.php" class="btn btn-light"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
            ';
        ?>
    </div>

</div>


<div id="respuestasModal" name="respuestasModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-backdrop='static' data-keyboard='false'>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <b><h5 class="modal-title" id="exampleModalLabel"></h5></b>
            </div>
            <div class="modal-body">

                <form id="formCalificarRespuestas" name="formCalificarRespuestas" method="POST" onsubmit="return calificarRespuestas();" autocomplete="off">

                    
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="container">
                                <p id="text_justify" class="text-justify">
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div id="preguntas"></div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnEstandar" id="btnCerrar" name="btnCerrar" data-dismiss="modal" onclick=""><i class='fa fa-times-circle-o' style='font-size:16px;'></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary btnEstandar" onclick=""><i class="fa fa-save" style="font-size:16px"></i> Guardar</button> 
                    </div>

                </form>                    
            <!-- fin formulario -->
        </div>
    </div>
</div>

<style>
    /*.modal-lg { 
        max-width: 60%; 
    }*/
</style>

<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/respuestas.js" ></script>


