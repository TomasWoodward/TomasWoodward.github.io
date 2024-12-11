<?php
if (!defined('FROM_ROUTER')) {
	header('Location: ../index.php');
}
require_once 'dbModel.php';
require_once __DIR__ . '/../controller/countryController.php'; // Asegúrate de incluir el controlador

class UserModel
{
	private $db;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function getAlbums($username)
	{
		$userId = $this->getUserId($username);
		$statements = $this->db->prepare("SELECT * FROM albumes WHERE Usuario = ? ORDER BY titulo DESC");
		$statements->bind_param("i", $userId);
		$statements->execute();
		$result = $statements->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	public function getUser($username)
	{
		$statements = $this->db->prepare("SELECT * FROM usuarios WHERE nomUsuario = ?");
		$statements->bind_param("s", $username);
		$statements->execute();
		$result = $statements->get_result();

		return $result->fetch_assoc();
	}

	public function getUserId($username)
	{
		$statements = $this->db->prepare("SELECT idUsuario FROM usuarios WHERE nomUsuario = ?");
		$statements->bind_param("s", $username);
		$statements->execute();
		$result = $statements->get_result();
		$row = $result->fetch_assoc();
		return $row["idUsuario"];
		; // Devuelve el idUsuario o null si no existe
	}

	public function getUserName($userId)
	{
		$statements = $this->db->prepare("SELECT nomUsuario from `usuarios` where idUsuario = ?");
		$statements->bind_param("i", $userId);
		$statements->execute();
		$result = $statements->get_result();
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

		$nacimiento = DateTime::createFromFormat('d/m/Y', $nacimiento);
		if ($nacimiento)
			$nacimiento = $nacimiento->format('Y-m-d');
		// Preparar la consulta SQL para insertar un usuario
		$statements = $this->db->prepare(
			"INSERT INTO usuarios 
			(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, Estilo, FRegistro) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)"
		);

		// Enlazar los parámetros a la consulta
		$statements->bind_param(
			"sssissisi",
			$username,
			$hashedPassword,
			$email,
			$sexo,
			$nacimiento,
			$ciudad,
			$paisId,
			$foto,
			$estilo
		);

		// Ejecutar la consulta y verificar el resultado
		if (!$statements->execute()) {
			$_SESSION["error"] = "Error al registrar el usuario";
			header('Location: ../index.php?action=errorPage');
		}
		return $statements->execute();
	}

	public function updateUser(
		$userId,
		$username,
		$email,
		$sexo,
		$nacimiento,
		$ciudad,
		$foto,
		$paisId,
		$password
	) {

		if (empty($userId)) {
			return false; // Retornar false si no se proporciona un userId
		}

		// Preparar la consulta dinámica
		$fields = [];
		$params = [];
		$types = '';

		if (!empty($username)) {
			$fields[] = "NomUsuario = ?";
			$params[] = $username;
			$types .= 's';
		}
		if (!empty($email)) {
			$fields[] = "Email = ?";
			$params[] = $email;
			$types .= 's';
		}
		if (!empty($sexo)) {
			$fields[] = "Sexo = ?";
			$params[] = $sexo;
			$types .= 's';
		}
		if (!empty($nacimiento)) {
			$fields[] = "FNacimiento = ?";
			$params[] = $nacimiento;
			$types .= 's';
		}
		if (!empty($ciudad)) {
			$fields[] = "Ciudad = ?";
			$params[] = $ciudad;
			$types .= 's';
		}
		if (!empty($foto)) {
			$fields[] = "Foto = ?";
			$params[] = $foto;
			$types .= 's';
		}
		if (!empty($paisId)) {
			$fields[] = "Pais = ?";
			$params[] = $paisId;
			$types .= 'i';
		}
		if (!empty($password)) {
			$fields[] = "Clave = ?";
			$params[] = $password;
			$types .= 's';
		}

		// Verificar si hay campos para actualizar
		if (empty($fields)) {
			return false; // Si no hay nada que actualizar, retorna false
		}

		// Construir la consulta SQL
		$sql = "UPDATE usuarios SET " . implode(", ", $fields) . " WHERE idUsuario = ?";
		$params[] = $userId; // Agregar el userId al final
		$types .= 'i';

		// Preparar y ejecutar la consulta
		$statement = $this->db->prepare($sql);

		$statement->bind_param($types, ...$params);
		if (!$statement->execute()) {
			return false; // Retornar false si la actualización falla
		}

		return true; // Retornar true si la actualización fue exitosa
	}



	public function getStyle($userId)
	{
		$result = $this->db->prepare("SELECT nombre  FROM usuarios u JOIN estilos a ON a.idEstilo = u.estilo WHERE idUsuario = ?");
		$result->bind_param("i", $userId);
		$result->execute();
		$result = $result->get_result();
		$style = $result->fetch_assoc();
		return $style;
	}

	public function updateStyle($userId, $styleId)
	{
		$statement = $this->db->prepare("UPDATE usuarios SET estilo = ? WHERE idUsuario = ?");
		$statement->bind_param("ii", $styleId, $userId);
		$statement->execute();
		return $statement->affected_rows;
	}

	public function deleteAccount($userId)
	{
		$statement = $this->db->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
		$statement->bind_param("i", $userId);
		$statement->execute();
	}

	public function closeConection()
	{
		$this->db->close();
	}
}
?>