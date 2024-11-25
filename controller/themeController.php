<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once __DIR__ . '/../model/themeModel.php';

class ThemeController {
    private $themeModel;

    public function __construct() {
        // Crear conexión a la base de datos y modelo
        $db = Database::getInstance(); // Supongamos que `Database` es una clase para conectar
        $this->themeModel = new ThemeModel($db);
    }

    public function listThemes() {
        $themes = $this->themeModel->getAllThemes(); // Llamada a getAllThemes() en el modelo
        return $themes;
    }
    public function closeConection(){
        $this->themeModel->closeConection();
    }

}

?>
