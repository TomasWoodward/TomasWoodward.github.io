<?php 
if(!defined('FROM_ROUTER')){
	echo "You don't have access to this file";
	header('Location: ../index.php');

}
require_once __DIR__ . '/../model/countryModel.php';

class CountryController {
	private $countryModel;

	public function __construct() { 
		$db = Database::getInstance(); 
        $this->countryModel = new countryModel($db);
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
	public function getCountryIdByName($name){
        $countryId = $this->countryModel->getCountryIdByName($name);
        return $countryId;
    }	
	public function closeConection(){
        $this->countryModel->closeConection();
    }
}