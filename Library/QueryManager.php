<?php
class QueryManager {
        //Declaramos el objeto pdo
        private $pdo;
        //Declaramos el metodo constructor
        public function __construct($USER, $PASS, $DB) {
           try {
               //Invocamos la clase pdo
               $this->pdo = new PDO('mysql:host=localhost;dbname'.$DB.';charset=utf8',
               $USER, $PASS,
                [
                    PDO::ATTR_EMULATE_PREPARES=> false,
                    PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
                ]
            );
           } catch (PDOException $e) {
               print "¡Error!:". $e->getMessage();
               die();
           }
        }


}
?>