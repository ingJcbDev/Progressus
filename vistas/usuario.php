<?php
require 'structure/header.php';
?>

<div class="container box">
    <h1 align="center">Modulo Gestion de Usuario</h1>
    <div class="table-responsive">
        <div align="right">
            <!--<button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-success btnFueraTable" onclick="bloquearModal()">-->
            <!--<button type='button' class='btn btn-sm btn-outline-primary' data-toggle='modal' data-target='#modalCrearNuevaArea'>-->
            <button type="button" class="btn btn-success btnFueraTable" data-toggle="modal" data-target="#userModal" onclick="cargarDatosForm();">
                <i class="fa fa-user-plus"></i> Agregar Usuario
            </button>
        </div>
        <br>
        <table id="user_data" name="user_data" class="table display" style='width:100%; font-size:11px;'>
            <thead>
                <tr>
                    <th>usuario</th> 
                    <th>Nombre</th>
                    <th>Tipo documento</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Condicion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>

    </div>
</div>

<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<div id="userModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-backdrop='static' data-keyboard='false'>

    <!--<div  id='modalCrearNuevaArea' class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='modalCrearNuevaArea' aria-hidden='true' data-backdrop='static' data-keyboard='false'>-->

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestion de Usuarios</h5>
            </div>
            <div class="modal-body">
                <!-- inicio formulario -->
                <!--onsubmit="return registrarUsuario();"-->
                <form id="registroUsuario" name="registroUsuario" method="POST" autocomplete="off"> 
                    <?php
                    echo '<input id="ruta" type="hidden" value="' . $host . 'vistas/usuario.php">';
                    ?>                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipo_documento">Tipo Documento</label>
                            <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                                <option selected value="">--Seleccionar--</option>
                                <option value="CC">CC</option>
                                <option value="TI">TI</option>
                                <option value="RC">RC</option>
                            </select>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="num_documento">No. Documento</label>
                            <input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="No. Documento" required>
                            <input type="hidden" id="idusuario" name="idusuario">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control valEmail" id="email" name="email" placeholder="Correo" required>
                        </div>
                    </div>
                    <!--                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="perfil">Perfil</label>
                                                                            <select id="cargo" name="cargo" class="form-control" required>
                                                                                <option selected value="">--Seleccionar--</option>
                                                                                <option value="root">Root</option>
                                                                                <option value="profesor">Profesor</option>
                                                                                <option value="estudiante">Estudiante</option>
                                                                            </select> 
                                                                            
                                                                                <select id="select" name="select" class="form-control" required>
                                                                                <option selected value="">--Seleccionar--</option>
                                                                                <option value="root">Root</option>
                                                                                <option value="profesor">Profesor</option>
                                                                                <option value="estudiante">Estudiante</option>
                                                                            </select> 
                                                                            
                                                                            <div id="selectCargo" name="selectCargo"></div>
                                                                            
                                                                            
                                                                        </div>-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="condicion">Estado</label>
                            <select id="condicion" name="condicion" class="form-control" required>
                                <option selected value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="clave">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clave">Confirmacion Contraseña</label>
                            <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Confirmacion Contraseña" required>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btnEstandar" data-dismiss="modal" onclick="cleanModal();"><i class='fa fa-times-circle-o' style='font-size:16px;'></i> Cerrar</button>
                <button type="button" class="btn btn-primary btnEstandar" onclick="registrarUsuario();"><i class="fa fa-save" style="font-size:16px"></i> Guardar</button> 
            </div>

            </form>                    
            <!-- fin formulario -->
        </div>
    </div>
</div>
</div>
</div>

<?php
require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/usuario.js" ></script>