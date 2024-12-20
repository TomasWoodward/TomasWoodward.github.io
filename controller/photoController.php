<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once __DIR__ . '/../model/photoModel.php';

class PhotoController {
    private $photoModel;

    public function __construct() {
        $db = Database::getInstance(); 
        $this->photoModel = new PhotoModel($db);
    }


	public function listLastPhotos() {
		$photos = $this->photoModel->getLastPhotos();
		return $photos;
	}

    public function createPhoto($title, $description, $date, $country, $album, $file, $alt) {
        $photo = $this->photoModel->addPhoto($title, $description, $date, $country, $album, $file, $alt);
        return $photo;
    }


    public function viewPhoto($params) {
        $idFoto = $params;
        if ($idFoto) {
            $photo = $this->photoModel->getPhotoById($idFoto);
			return $photo;
        } else {
            echo "ID de foto no proporcionado.";
        }
    }

    public function busqueda (){
        $titulo = $_POST['searchTitle'] ?? '';
        $fecha = $_POST['searchDate'] ?? '';
        $pais = $_POST['country'] ?? "";

        $photos= $this ->photoModel->busquedaFoto($titulo, $fecha, $pais);
        return $photos;
    }
    public function getAllAlbums_PhotosByUser($idUsuario){ 
        $photos = $this->photoModel->getAllAlbums_PhotosByUser($idUsuario);
        return $photos;
    }

    public function getAlbumPhotos ($idAlbum){
        $photos = $this->photoModel->getAlbumPhotos($idAlbum);
        return $photos;
    }

    public function getAllData($idUser){
        $photos = $this->photoModel->getAllData($idUser);
        return $photos;
    }
    
    public function addAlbum($title,$description,$user){
        return $this->photoModel->addAlbum($title, $description,$user);
    }

    public function getAlbumByName($name){
        return $this->photoModel->getAlbumByName($name);
    }

    public function getAlbumPhotoCount($idAlbum) {
        $count = $this->photoModel->getAlbumPhotoCount($idAlbum);
        return $count;
    }

    public function addSolicitud($album, $nombre, $titulo, $descripcion, $email, $direccion, $telefono, $color, $copias, $resolucion, $fecha, $iColor, $coste) {
        return $this->photoModel->addSolicitud($album, $nombre, $titulo, $descripcion, $email, $direccion, $telefono, $color, $copias, $resolucion, $fecha, $iColor, $coste);
    }

    public function getAlbumIdByName($albumName) {
        return $this->photoModel->getAlbumIdByName($albumName);
    }
    public function closeConection(){
        $this->photoModel->closeConection();
    }
}

?>
