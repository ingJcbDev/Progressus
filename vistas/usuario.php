<?php
   require 'structure/header.php';
?>

<div class="container box">
    <h1 align="center">Modulo de Gestion de Usuario</h1>
    <br />
    <div class="table-responsive">
        <br />
        <div align="right">
            <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                class="btn btn-info btn-lg">Agregar Usuario</button>
        </div>
        <br /><br />

        <table id="user_data" class="table display" style='width:100%; font-size:11px;'>
            <thead>
                <tr>
                    <th>idusuario</th>
                    <th>nombre</th>
                    <th>tipo_documento</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>email</th>
                    <th>cargo</th>
                    <th>login</th>
                    <th>condicion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>

    </div>
</div>

<?php
 	require 'structure/footer.php';
?>

<script type="text/javascript" src="scripts/usuario.js" ></script>