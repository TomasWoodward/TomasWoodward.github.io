<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once(__DIR__ . '/dbModel.php');
;
class ThemeModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }



    // Obtener todas las fotos
    public function getAllThemes()
    {
        $stmt = $this->db->prepare("SELECT * FROM estilos");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

  
}
