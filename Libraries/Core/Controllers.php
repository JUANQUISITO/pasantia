<?php
class Controllers{
    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
    }
    public function loadModel()//cargar Modelo o obtener de la carpeta Modelo
    {
        $model = get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        if (file_exists($routClass)) {
            require_once($routClass);
            $this->model = new $model();
        }
    }
}
?>