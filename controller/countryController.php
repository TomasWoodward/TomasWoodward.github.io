<?php 
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once __DIR__ . '/../model/countryModel.php';

class CountryController {
	private $countryModel;

	public function __construct() { 
		$db = Database::getInstance(); // Supongamos que `Database` es una clase para conectar
        $this->countryModel = new countryModel();
	}

	public function getCountries() {
		$countries = $this->countryModel->getCountries();
		return $countries;
	}

	public function getCountryByName($name){
		$country = $this->countryModel->getCountryByName($name);
		return $country;
	}

	public function getCountryById($id){
		$country = $this->countryModel->getCountryById($id);
		return $country;
	}	
}