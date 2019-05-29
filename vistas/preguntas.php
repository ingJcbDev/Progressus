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
echo'<input type="hidden" name="materia" id="materia" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
echo'<input type="hidden" name="periodo" id="periodo" value="' . $_SESSION['dataUser']['M']['periodo'] . '" />';
echo'<input type="hidden" name="perfil" id="perfil" value="' . $_SESSION['dataUser']['perfil_id'] . '" />';
echo'<input type="hidden" name="ruta" id="ruta" value="' . $host . '" />';
?>

<!--<div class="row">
  <div class="col-3">col-3</div>
  <div class="col-6">
                    
                    <div class="card" style="width: 18rem;">-->
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

<!--<div class="container box">
    <h1 align="center">Modulo Gestion de Usuario</h1>
    <div class="table-responsive">
    </div>
</div>-->


<div id="preguntasModal" name="preguntasModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-backdrop='static' data-keyboard='false'>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestion de Preguntas</h5>
            </div>
            <div class="modal-body">

                <form id="registroPreguntas" name="registroPreguntas" method="POST" onsubmit="return insertarPreguntas();" autocomplete="off">
                    
                    <?php
                    echo'<input type="hidden" name="materia1" id="materia1" value="' . $_SESSION['dataUser']['M']['materia'] . '" />';
                    ?>                        

                    <div class="form-group">
                        <label for="temaTextarea"><b>Titulo:</b></label>
                        <input type="text" class="form-control" id="tituloTema" name="tituloTema" placeholder="Titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="temaTextarea"><b>Tema:</b></label>
                        <textarea class="form-control" id="temaTextarea" name="temaTextarea" rows="5" maxlength="1000024" placeholder="Tema ......................" required></textarea>
                    </div>

                    <div id="modalPreguntas_"></div>

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








<div class="container box">
    <div class="card">
        <div class="card-header">
            <center><h5><div id="titulo" name="titulo"></div></h5></center>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#preguntasModal">
                            Gestionar Tema
                        </button>-->
            <div class="row">
                <div class="col-sm-6">
                    <label for="sel1" >Cantidad de Preguntas</label>
                    <select class="form-control" style="padding-bottom: 0px;padding-top: 0px;padding-right: 12px;width: 176px;height: 27px;" id="can" name="can">
                        <option value="2">1</option>
                        <option value="3">2</option>
                        <option value="4">3</option>
                        <option value="5">4</option>
                        <option value="6">5</option>
                        <option value="7">6</option>
                        <option value="8">7</option>
                        <option value="9">8</option>
                        <option value="10">9</option>
                        <option value="11">10</option>
                    </select>            
                </div>
                <div class="col-sm-6">
                    <div align="right">
                        <button type="button" class="btn btn-success btnFueraTable" data-toggle="modal" data-target="#preguntasModal" onclick="recargarModal();">
                            <i class="fa fa-user-plus"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>

            <br>
            <table id="preguntas_table" name="preguntas_table" class="table display" style='width:100%; font-size:11px;'>
                <thead>
                    <tr>
                        <!--<th>Materias id</th>--> 
                        <th>Materia</th>
                        <th>Periodo</th>
                        <th>Titulo del tema</th>
                        <th>Condicion</th>
                        <!--<th>Acciones</th>-->
                    </tr>
                </thead>
            </table>

        </div>
    <div style="text-align: center;">

        <?php
        echo'
               <a href="' . $host . 'vistas/periodo.php" class="btn btn-light"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
            ';
        ?>
    </div>        
    <br>
    </div>


</div>

<style>
    .modal-lg { 
        max-width: 80%; 
    }
</style>

<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/preguntas.js" ></script>


