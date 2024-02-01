<?php
spl_autoload_register(function ($class)//Registrar las funciones dadas como implementación de __autoload()
 {
    
    if (file_exists("Libraries/" . 'Core/' . $class . '.php')) {
        require_once("Libraries/" . 'Core/' . $class . '.php');
    }
});
?>