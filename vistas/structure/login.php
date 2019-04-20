<!-- Modal -->
<div class="modal fade" id="loginModal" name="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="text-center">
                    <?php
                    echo'<img src="' . $host . 'assets/images/loginGlasses1.png" class="rounded-circle" alt="Cinque Terre" width="150px" height="150px">';
                    ?>        
                </div>

                <form id="loginForm" name="loginForm" method="POST" onsubmit="return login();" autocomplete="off">
                <?php
                    echo '<input type="hidden" id="rutaLogin" name="rutaLogin" value="' . $host . '">';
                ?>
                    <br>
                    <br>
                    <div class="input-group mb-3" style="border:none;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="login0" name="login0" placeholder="Usuario" required>
                    </div>

                    <div class="input-group mb-3" style="border:none;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" id="clave0" name="clave0" placeholder="Contraseña" required>
                    </div>  

                    <br>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                </form>                    
                <!-- fin formulario -->   
                <hr size="60">

            </div>
        </div>
    </div>
</div>
