<?php
class Conexion {
    //Metodo constructor
     function __construct() {
         //Creamos el objeto db y le asignamos la clase queryManager
        $this->db = new QueryManager("root","","sistem_facturacion");
    }


}
?>