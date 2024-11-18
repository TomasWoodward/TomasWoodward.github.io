<?php
require_once 'dbModel.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getUser($username) {
        $statements = $this->db->prepare("SELECT * FROM usuarios WHERE nomUsuario = ?");
        $statements->bind_param("s", $username);
        $statements->execute();
        $result = $statements->get_result();
        return $result->fetch_assoc();
    }

    public function registerUser($username, $password, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo) {
		// Encriptar la contraseña con BCRYPT
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	
		// Preparar la consulta SQL para insertar un usuario
		$statements = $this->db->prepare(
			"INSERT INTO usuarios (nomUsuario, clave, email, sexo, fNacimiento, ciudad, pais, foto, estilo) 
			 		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
		);
	
		// Enlazar los parámetros a la consulta
		$statements->bind_param(
			"sssissisi", 
			$username,         // nomUsuario (string)
			$hashedPassword,   // clave (string)
			$email,            // email (string)
			$sexo,             // sexo (int)
			$nacimiento,       // fNacimiento (string: formato 'YYYY-MM-DD')
			$ciudad,           // ciudad (string)
			$pais,             // pais (int)
			$foto,             // foto (string: URL o ruta)
			$estilo            // estilo (int)
		);
	
		// Ejecutar la consulta y devolver el resultado
		return $statements->execute();
	}
}
?>