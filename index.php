<?php
// phpinfo();exit;
require_once("Config/Config.php");//configuracion de la conexion de la base de datos y la URL
require_once("Helpers/Helpers.php");
//configuracion de las rutas amigables
$url = isset($_GET['url']) ? $_GET['url'] : "Home/home"; //obtenemos la url desde .taccess 
$arrUrl = explode("/", $url);
$controller = $arrUrl[0]; //para el Controlador
$methop = $arrUrl[0]; //para el Metodo
$params = ""; //paso de parametros dentro de un controlador
if (isset($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $methop = $arrUrl[1];
    }
}
if (isset($arrUrl[2])) {
    if ($arrUrl[2] != "") {
        for ($i=2; $i < count($arrUrl); $i++) { 
            $params .= $arrUrl[$i]. ',';
        }
        $params = trim($params, ',');
    }
}
// echo $controller;
// echo $methop;
// echo $params;
require_once("Libraries/Core/Autoload.php");//llamando al autoload para manejo de controlador
require_once("Libraries/Core/Load.php");
?>