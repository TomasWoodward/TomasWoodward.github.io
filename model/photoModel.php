<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once(__DIR__ . '/dbModel.php');
;
class PhotoModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Insertar una nueva foto
    public function addPhoto($titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO fotos (titulo, descripcion, fecha, pais, album, fichero, alternativo) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssiiis", $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo);
        return $stmt->execute();
    }

    // Obtener todas las fotos
    public function getAllPhotos()
    {
        $stmt = $this->db->prepare("SELECT * FROM fotos ORDER BY fRegistro DESC");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getLastPhotos()
    {
        $stmt = $this->db->prepare("SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto ORDER BY fRegistro DESC LIMIT 5");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener una foto por ID
    public function getPhotoById($idFoto)
    {
        $stmt = $this->db->prepare("SELECT  u.idUsuario as id_usuario,
                                            f.titulo AS titulo_foto, 
                                            a.titulo AS titulo_album, 
                                            p.nombre AS nombre_pais, 
                                            u.nomUsuario AS nombre_usuario,
                                            f.*, -- Incluye todas las columnas de 'fotos' si necesario
                                            a.idAlbum
                                            FROM fotos f
                                            JOIN paises p ON p.idPais = f.Pais
                                            JOIN albumes a ON a.idAlbum = f.album
                                            JOIN usuarios u ON a.usuario = u.idUsuario
                                            WHERE f.idFoto = ?;");
        $stmt->bind_param("i", $idFoto);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Actualizar una foto
    public function updatePhoto($idFoto, $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo)
    {
        $stmt = $this->db->prepare(
            "UPDATE fotos 
             SET titulo = ?, descripcion = ?, fecha = ?, pais = ?, album = ?, fichero = ?, alternativo = ? 
             WHERE idFoto = ?"
        );
        $stmt->bind_param("sssiiisi", $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo, $idFoto);
        return $stmt->execute();
    }

    // Eliminar una foto por ID
    public function deletePhoto($idFoto)
    {
        $stmt = $this->db->prepare("DELETE FROM fotos WHERE idFoto = ?");
        $stmt->bind_param("i", $idFoto);
        return $stmt->execute();
    }

    //buscar fotos por titulo, fecha, y pais
    public function busquedaFoto($titulo, $fecha, $pais)
    {
        $titulo = '%' . $titulo . '%';
        $stmt = $this->db->prepare("SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto WHERE titulo LIKE ? OR fecha LIKE ? OR nombre LIKE ?");
        $stmt->bind_param("sss", $titulo, $fecha, $pais);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function getPhotosByUser($idUsuario)
    {
        $stmt = $this->db->prepare("SELECT albumes.idAlbum,
                                        albumes.titulo AS AlbumTitulo,
                                        albumes.descripcion AS AlbumDescripcion,
                                        fotos.idFoto,
                                        fotos.titulo AS FotoTitulo,
                                        fotos.descripcion AS FotoDescripcion,
                                        fotos.fecha AS FotoFecha,
                                        fotos.pais AS FotoPais,
                                        fotos.fichero AS FotoFichero,
                                        fotos.alternativo AS FotoAlternativo,
                                        fotos.fRegistro AS FotoFRegistro
                                    FROM 
                                        albumes
                                    LEFT JOIN 
                                        fotos ON albumes.idAlbum = fotos.album
                                    WHERE 
                                        albumes.usuario = ?
                                    ORDER BY 
                                        albumes.idAlbum, fotos.idFoto;
                                    ");
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
