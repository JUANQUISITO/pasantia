<?php
class Views{
    function getView($controller, $view,$data="", $alert="", $config = "",$convenios="",$solicitudp="", $cliente = "", $estudiantes = "", $pasantias = "")//devolviendo parametros a la vista
    {
        $controller = get_class($controller);
        if ($controller == "Home") {
            $view = "Views/".$view.".php";
        }else{
            $view = "Views/" . $controller . "/" . $view . ".php";//corregir aqui
        }
        require_once($view);
         
    }
}

?>