<?php
class Index_model extends Conexion{

    public function __construct() {
       parent::__construct();
    }
    function userLogin($email, $password) {
        return $password;
    }
}


?>