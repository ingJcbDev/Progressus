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

                <!--<form id="registroUsuario" name="registroUsuario" method="POST" onsubmit="return registrarUsuario();" autocomplete="off">--> 
                <form id="registroPreguntas" name="registroPreguntas" method="POST" onsubmit="return insertarPreguntas();" autocomplete="off">

                    <div class="form-group">
                        <label for="temaTextarea"><b>Titulo:</b></label>
                        <input type="text" class="form-control" id="tituloTema" name="tituloTema" placeholder="Titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="temaTextarea"><b>Tema:</b></label>
                        <textarea class="form-control" id="temaTextarea" name="temaTextarea" rows="5" maxlength="1000024" placeholder="Tema ......................" required></textarea>
                    </div>

                    <?php
                    $can = (int) $_SESSION['cantidadPreguntas'];
                    for ($index = 1; $index < $can; $index++) {

                        echo'
                
                <!------------------->

                <div class="card w-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="pregunta1"><b>Pregunta ' . $index . ':</b></label>
                            <input type="text" class="form-control" id="pregunta_' . $index . '" name="pregunta_' . $index . '" placeholder="Pregunta ' . $index . '" required>
                        </div>

                        <label for="pregunta1"><b>Respuestas ' . $index . ':</b></label>
                        <div class="card w-100">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="respuesta_' . $index . '_1" name="respuesta_' . $index . '_1" placeholder="Respuesta 1" required>                                        

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioRespuesta_' . $index . '_1" name="radioRespuesta_' . $index . '" value="radioRespuesta_' . $index . '_1" class="custom-control-input" required>
                                            <label class="custom-control-label" for="radioRespuesta_' . $index . '_1"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-6">


                                        <input type="text" class="form-control" id="respuesta_' . $index . '_2" name="respuesta_' . $index . '_2" placeholder="Respuesta 2" required>                                        

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioRespuesta_' . $index . '_2" name="radioRespuesta_' . $index . '" value="radioRespuesta_' . $index . '_2" class="custom-control-input" required>
                                            <label class="custom-control-label" for="radioRespuesta_' . $index . '_2"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>
                                        </div>

                                        
                                    </div>
                                </div>   
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">


                                        <input type="text" class="form-control" id="respuesta_' . $index . '_3" name="respuesta_' . $index . '_3" placeholder="Respuesta 3" required>                                        

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioRespuesta_' . $index . '_3" name="radioRespuesta_' . $index . '" value="radioRespuesta_' . $index . '_3" class="custom-control-input" required>
                                            <label class="custom-control-label" for="radioRespuesta_' . $index . '_3"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="respuesta_' . $index . '_4" name="respuesta_' . $index . '_4" placeholder="Respuesta 4" required>                                        

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioRespuesta_' . $index . '_4" name="radioRespuesta_' . $index . '" value="radioRespuesta_' . $index . '_4" class="custom-control-input" required>
                                            <label class="custom-control-label" for="radioRespuesta_' . $index . '_4"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></label>
                                        </div>


                                    </div>
                                </div>                     

                            </div>
                        </div>

                    </div>
                </div>

                <!------------------->

                            ';
                    }
                    ?>

                    <!--</form>-->



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
            
        <div align="right">
            <button type="button" class="btn btn-success btnFueraTable" data-toggle="modal" data-target="#preguntasModal" onclick="">
                <i class="fa fa-user-plus"></i> Agregar
            </button>
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
    </div>


</div>








<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/preguntas.js" ></script>


