<?php
class Index_model extends Conexion{

    public function __construct() {
       parent::__construct();
    }
    function userLogin($email, $password) {
        $where = "Email = :Email";
        $param = array('Email'=> $email);
        $response = $this->db->select1("*",'usuarios',$where,$param);
        return $response;
    }
}


?>