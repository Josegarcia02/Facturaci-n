<?php
require "config.php";
$url = $_GET["url"] ??"Index/index";
$url = explode("/", $url);
$controller = "";
$method = "";
if(isset($url[0])){
    $controller = $url[0];
}
if(isset($url[1])){
    if($url[1] != ''){
        $method = $url[1];
    }
}
spl_autoload_register(function($class){
    //Verificamos si existe la carpeta libreria
if(file_exists(LIBRARY.$class.".php")) {
    require LIBRARY.$class.".php";
}
});
require 'Controllers/Errors.php';
$error = new Errors();
//$obj = new Controllers();
//echo $controller."------ ".$method;
//Llamamos a los controladores
$controllersPath = "Controllers/".$controller.'.php';
//Verficamos si existe el controlador
if(file_exists($controllersPath)) {
    //Requerimos el controlador
    require $controllersPath;
    //Instaciamos la clase
    $controller = new $controller();
    if(isset($method)) {
        if(method_exists($controller, $method)) {
            $controller->{$method}();
        }else {
            $error->error();
        }
    }
}else{
    $error->error();
}
?>