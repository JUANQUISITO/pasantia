<?php 
    class Password extends Controllers {
        
        public static function hashear($password) {
            $mensaje = "hola";
            return $mensaje;
            // return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        }
        public static function verify($password, $hash) {
            return password_verify($password, $hash);
        }
    }
?>