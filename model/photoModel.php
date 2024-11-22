<?php
if (!defined('FROM_ROUTER')) {
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
        $result = $stmt->execute();
        if ($result === false) {
            $_SESSION["error"] = " Error adding photo";
            header("Location: ../index.php?action=errorPage");
        }
        return $result;
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
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    // Obtener una foto por ID
    public function getPhotoById($idFoto)
    {
        $stmt = $this->db->prepare("SELECT  u.idUsuario as id_usuario,
                                            f.titulo AS titulo_foto,
                                            a.idAlbum AS id_album, 
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
        $result = $stmt->get_result()->fetch_assoc();
        return $result;

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
        if ($fecha == "" && $pais == '') {
            $stmt = $this->db->prepare('SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto WHERE titulo LIKE ?');
            $stmt->bind_param('s', $titulo, );
        } else {
            $stmt = $this->db->prepare("SELECT * FROM fotos f JOIN paises p ON p.idPais = f.idFoto WHERE titulo LIKE ? OR fecha LIKE ? OR nombre LIKE ?");
            $stmt->bind_param("sss", $titulo, $fecha, $pais);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function getAllAlbums_PhotosByUser($idUsuario)
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
                                        albumes.idAlbum, fotos.fRegistro DESC
                                    ");
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAlbumPhotos($idAlbum)
    {
        $stmt = $this->db->prepare("SELECT 
                                        a.titulo AS albumTitulo,
                                        a.descripcion AS descripcion_album,
                                        a.usuario AS usuario_album,
                                        f.idFoto AS fotoId,
                                        f.titulo AS fotoTitulo,
                                        f.alternativo AS fotoAlternativo,
                                        f.fichero AS fotoFichero,
                                        f.descripcion AS fotoDescripcion,
                                        f.fecha AS fotoFecha,
                                        p.nombre AS fotoPais,
                                        agg.total_fotos,
                                        agg.paises,
                                        agg.inicio_intervalo,
                                        agg.fin_intervalo
                                    FROM 
                                        albumes a
                                    LEFT JOIN 
                                        fotos f ON a.idAlbum = f.album
                                    LEFT JOIN 
                                        paises p ON f.pais = p.idPais
    
                                    LEFT JOIN (
                                    SELECT 
                                        f.album AS album_id,
                                        COUNT(f.idFoto) AS total_fotos,
                                        GROUP_CONCAT(DISTINCT p.nombre ORDER BY p.nombre ASC SEPARATOR ', ') AS paises,
                                        MIN(f.fecha) AS inicio_intervalo,
                                        MAX(f.fecha) AS fin_intervalo
                                    FROM 
                                        fotos f
                                    LEFT JOIN 
                                        paises p ON f.pais = p.idPais
                                    GROUP BY 
                                        f.album
                                ) agg ON a.idAlbum = agg.album_id
                                    WHERE 
                                        a.idAlbum = ?

                                ORDER BY 
                                    a.idAlbum, f.fecha;
                                ");
        $stmt->bind_param("i", $idAlbum);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
