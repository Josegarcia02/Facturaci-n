<?php
class Index_model extends Conexion{

    public function __construct() {
       parent::__construct();
    }
    function userLogin($email, $password) {
        $where = "Email = :Email";
        $param = array('Email'=> $email);
        $response = $this->db->select1("*",'usuarios',$where,$param);
        if (is_array($response)) {
            $response = $response['results'];
            if (password_verify($password,$response["Password"]))  {
                $data = array(
                    "IdUsuario" => $response["IdUsuario"],
                    "Nombre" => $response["Nombre"],
                    "Apellido" => $response["Apellido"],
                    "Role" => $response["Role"],
                    "Imagen" =>$response["Imagen"],
                );
                return $data;
            } else {
                $data = array(
                  "IdUsuario" => 0,
              );
              return $data;
            }
            
        } else {
            return $response;
        }
        
    }
}


?>