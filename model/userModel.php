<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}
require_once 'dbModel.php';
require_once __DIR__ . '/../controller/countryController.php'; // Asegúrate de incluir el controlador

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

	public function getAlbums($username) {
		$userId = $this->getUserId($username);
		$statements = $this->db->prepare("SELECT * FROM albumes WHERE Usuario = ?");
		$statements->bind_param("i", $userId);
		$statements->execute();
		$result = $statements->get_result();
		if($result->num_rows <= 0) {
			$_SESSION["error"] = "No albums found";
			header("Location: ../index.php?action=errorPage");
		}
		return $result->fetch_all(MYSQLI_ASSOC);
	}
    public function getUser($username) {
        $statements = $this->db->prepare("SELECT * FROM usuarios WHERE nomUsuario = ?");
        $statements->bind_param("s", $username);
        $statements->execute();
        $result = $statements->get_result();	
		if($result->num_rows <= 0) {
			$_SESSION["error"] = "User not found";
			header("Location: ../index.php?action=errorPage");
		}
        return $result->fetch_assoc();
    }

	public function getUserId($username) {
		$statements = $this->db->prepare("SELECT idUsuario FROM usuarios WHERE nomUsuario = ?");
		$statements->bind_param("s", $username);
		$statements->execute();
		$result = $statements->get_result();
		$result->fetch_assoc();
		if($result->num_rows <= 0) {
			$_SESSION["error"] = "User not found";
			header("Location: ../index.php?action=errorPage");
		}
		return $result; // Devuelve el idUsuario o null si no existe
	}

	public function getUserName($userId){
		$statements = $this->db->prepare("SELECT nomUsuario from `usuarios` where idUsuario = ?");
        $statements->bind_param("i", $userId);
        $statements->execute();
        $result = $statements->get_result();	
		if($result->num_rows <= 0) {
			$_SESSION["error"] = " User not found";
			header("Location: ../index.php?action=errorPage");
		}
        return $result->fetch_assoc();
	}
	
	public function registerUser(
		$username,
		$password,
		$email,
		$sexo,
		$nacimiento,
		$ciudad,
		$paisNombre,
		$foto,
		$estilo,
		$countryController // Pasar el controlador de países para obtener el id del pais a partir del nombre
	) {
		// Obtener el idPais usando el controlador de países
		$country = $countryController->getCountryByName($paisNombre);
	
		if (!$country || !isset($country['idPais'])) {
			throw new Exception("País no encontrado: $paisNombre");
		}
	
		$paisId = $country['idPais']; // Asignar el id del país
	
		// Encriptar la contraseña con BCRYPT (máximo 255 caracteres)
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	
		// Preparar la consulta SQL para insertar un usuario
		$statements = $this->db->prepare(
			"INSERT INTO usuarios 
			(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, Estilo, FRegistro) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)"
		);
	
		// Enlazar los parámetros a la consulta
		$statements->bind_param(
			"sssissisi",
			$username,         // NomUsuario (string, máx 15)
			$hashedPassword,   // Clave (string, máx 255)
			$email,            // Email (string, máx 254)
			$sexo,             // Sexo (int)
			$nacimiento,       // FNacimiento (string: formato 'YYYY-MM-DD')
			$ciudad,           // Ciudad (string)
			$paisId,           // Pais (int)
			$foto,             // Foto (string: URL o ruta)
			$estilo            // Estilo (int)
		);
	
		// Ejecutar la consulta y verificar el resultado
		if (!$statements->execute()) {
			$_SESSION["error"] = "Error al registrar el usuario";
            header('Location: ../index.php?action=errorPage');
		}
		return true;
	}

	public function getEstilos(){
		$statements = $this->db->prepare("SELECT * FROM estilos");
		$statements->execute();
		$result = $statements->get_result();
		if($result->num_rows <= 0) {
			$_SESSION["error"] = "No styles found";
			header("Location: ../index.php?action=errorPage");
		}
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
}
?>
