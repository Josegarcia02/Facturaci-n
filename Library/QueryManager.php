<?php
class QueryManager {
        //Declaramos el objeto pdo
        private $pdo;
        //Declaramos el metodo constructor
        public function __construct($USER, $PASS, $DB) {
           try {
               //Invocamos la clase pdo
               $this->pdo = new PDO('mysql:host=localhost;dbname='.$DB.';charset=utf8',
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
        //Creamos un metodo para la consulta
        function select1($attr, $table, $where, $param) {
            try {
                //Verificamos si $where viene vacio
                if ($where =="") {
                    //Si viene vacio ejecutamos la siguiente consulta
                    $query = "SELECT ".$attr." FROM ".$table;    
                } else {
                    //Si $where no viene vacio ejecutamos la consulta
                    $query = "SELECT ".$attr." FROM ".$table." WHERE ".$where; 
                }
                //Declaramos un objeto $sth y preparamos la consulta
                $sth = $this->pdo->prepare($query);
                //Ejecutamos la consulta
                $sth->execute($param);
                //Creamos el objeto response
                $response = $sth->fetch(PDO::FETCH_ASSOC);
                //Retornamos un array
                return array("results" => $response);
            } catch (PDOException $e){
                return $e->getMessage();
            }
            $pdo = null;
        }

}
?>