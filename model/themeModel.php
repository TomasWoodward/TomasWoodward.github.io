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


public function getTheme($theme_id){
    $stmt = $this->db->prepare('SELECT * FROM estilos WHERE idEstilo = ?');
    $stmt->bind_param('i', $theme_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
    
    public function getAllThemes()
    {
        $stmt = $this->db->prepare("SELECT * FROM estilos");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function closeConection(){
        $this->db->close();
    }
  
}
