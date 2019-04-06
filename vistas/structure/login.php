<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="loginModal" name="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form id="loginForm" name="loginForm" method="POST" onsubmit="return registrarUsuario();" autocomplete="off">

                    <div class="form-group">
                        <label for="login">Usuario</label>
                        <input type="email" class="form-control" id="login0" name="login0" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input type="password" class="form-control" id="clave0" name="clave0" placeholder="Contraseña">
                    </div>
<!--                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck">
                            <label class="form-check-label" for="dropdownCheck">
                                Remember me
                            </label>
                        </div>
                    </div>                    -->

                </form>                    
                <!-- fin formulario -->          

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="prueba();">Save changes</button>
            </div>
        </div>
    </div>
</div>
