<?php
class Conexion {
    //Metodo constructor
     function __construct() {
         //Creamos el objeto db y le asignamos la clase queryManager
        $this->db = new QueryManager("root","","sistema_facturacion");
    }


}
?>