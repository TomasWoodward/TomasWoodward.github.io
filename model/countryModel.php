<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once(__DIR__ . '/dbModel.php');

class countryModel {
	private $db;

	public function __construct($db) 
	{
        $this->db = $db;
    }
	
	public function getCountries() {
		$stmt = $this->db->prepare("SELECT * FROM paises  ORDER BY nombre");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getCountryById($id) {
		$stmt = $this->db->prepare("SELECT nombre FROM paises WHERE idPais = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}

	public function getCountryByName($name){
		$stmt = $this->db->prepare("SELECT idPais FROM paises WHERE nombre = ? ");
		$stmt->bind_param("s", $name);
		$stmt->execute();
		return $stmt->get_result()->fetch_assoc();
	}
	public function closeConection(){
        $this->db->close();
    }
}
