<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once __DIR__ . '/../model/PhotoModel.php';

class PhotoController {
    private $photoModel;

    public function __construct() {
        // Crear conexión a la base de datos y modelo
        $db = Database::getInstance(); // Supongamos que `Database` es una clase para conectar
        $this->photoModel = new PhotoModel($db);
    }

    // Mostrar todas las fotos
    public function listPhotos() {
        $photos = $this->photoModel->getAllPhotos();
        return $photos;
    }

	public function listLastPhotos() {
		$photos = $this->photoModel->getLastPhotos();
		return $photos;
	}


    // Mostrar detalles de una foto
    public function viewPhoto($params) {
        $idFoto = $params;
        if ($idFoto) {
            $photo = $this->photoModel->getPhotoById($idFoto);
			return $photo;
        } else {
            echo "ID de foto no proporcionado.";
        }
    }

    // Agregar una nueva foto
    public function addPhoto($params) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $fecha = $_POST['fecha'] ?? '';
            $pais = $_POST['pais'] ?? 0;
            $album = $_POST['album'] ?? 0;
            $fichero = $_POST['fichero'] ?? '';
            $alternativo = $_POST['alternativo'] ?? '';

            if ($this->photoModel->addPhoto($titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo)) {
                header('Location: index.php'); // Redirigir tras éxito
            } else {
                echo "Error al agregar la foto.";
            }
        } else {
            require_once __DIR__ . '/../view/addPhoto.php'; // Vista para el formulario
        }
    }

    // Eliminar una foto
    public function deletePhoto($params) {
        $idFoto = $params['idFoto'] ?? null;
        if ($idFoto) {
            if ($this->photoModel->deletePhoto($idFoto)) {
                header('Location: index.php'); // Redirigir tras éxito
            } else {
				$_SESSION['error'] = 'Error al eliminar la foto.';
				header('Location: index.php?action=errorPage');
            }
        } else {
			$_SESSION['error'] = 'ID de foto no proporcionado.';
			header('Location: index.php?action=errorPage');
        }
    }

    // Editar una foto
    public function editPhoto($params) {
        $idFoto = $params['idFoto'] ?? null;
        if ($idFoto) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titulo = $_POST['titulo'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $fecha = $_POST['fecha'] ?? '';
                $pais = $_POST['pais'] ?? 0;
                $album = $_POST['album'] ?? 0;
                $fichero = $_POST['fichero'] ?? '';
                $alternativo = $_POST['alternativo'] ?? '';

                if ($this->photoModel->updatePhoto($idFoto, $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo)) {
                    header('Location: index.php'); // Redirigir tras éxito
                } else {
					$_SESSION['error'] = 'Error al eliminar la foto.';
					header('Location: index.php?action=errorPage');
	
                }
            } else {
                $photo = $this->photoModel->getPhotoById($idFoto);
                require_once __DIR__ . '/../view/editPhoto.php'; // Vista para editar la foto
            }
        } else {
			$_SESSION['error'] = 'ID de foto no proporcionado.';
			header('Location: index.php?action=errorPage');
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
    
}

?>
