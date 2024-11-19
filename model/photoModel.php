<?php
require_once(__DIR__ . '/dbModel.php');;
class PhotoModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insertar una nueva foto
    public function addPhoto($titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo) {
        $stmt = $this->db->prepare(
            "INSERT INTO fotos (titulo, descripcion, fecha, pais, album, fichero, alternativo) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssiiis", $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo);
        return $stmt->execute();
    }

    // Obtener todas las fotos
    public function getAllPhotos() {
        $stmt = $this->db->prepare("SELECT * FROM fotos ORDER BY fRegistro DESC");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

	public function getLastPhotos() {
        $stmt = $this->db->prepare("SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto ORDER BY fRegistro DESC LIMIT 5");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener una foto por ID
    public function getPhotoById($idFoto) {
        $stmt = $this->db->prepare("SELECT * FROM fotos WHERE idFoto = ?");
        $stmt->bind_param("i", $idFoto);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Actualizar una foto
    public function updatePhoto($idFoto, $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo) {
        $stmt = $this->db->prepare(
            "UPDATE fotos 
             SET titulo = ?, descripcion = ?, fecha = ?, pais = ?, album = ?, fichero = ?, alternativo = ? 
             WHERE idFoto = ?"
        );
        $stmt->bind_param("sssiiisi", $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo, $idFoto);
        return $stmt->execute();
    }

    // Eliminar una foto por ID
    public function deletePhoto($idFoto) {
        $stmt = $this->db->prepare("DELETE FROM fotos WHERE idFoto = ?");
        $stmt->bind_param("i", $idFoto);
        return $stmt->execute();
    }

    //buscar fotos por titulo, fecha, y pais
    public function busquedaFoto($titulo, $fecha, $pais) {
        $stmt = $this->db->prepare("SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto WHERE titulo LIKE ? OR fecha LIKE ? OR nombre LIKE ?");
        $stmt->bind_param("sss", $titulo, $fecha, $pais);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
