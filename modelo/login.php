<?php

include_once('../config/db.php');

class UsuarioSql {

    private $con;

    // Constructor
    public function __construct() {
        $this->con = new Database();
    }
    
    

}

?>