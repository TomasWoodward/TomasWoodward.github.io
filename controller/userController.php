<?php
if (!defined('FROM_ROUTER')) {
    echo "You don't have access to this file";
    header('Location: ../index.php');
}
require_once __DIR__ . '/../model/userModel.php';
require_once __DIR__ . '/countryController.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($username, $password)
    {
        $user = $this->userModel->getUser($username);

        if ($user && password_verify($password, $user['clave'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function logout()
    {
        header('index.php?action=logOut');
    }

    public function register($username, $password, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo)
    {
        // Verificar si existe el usuario
        if ($this->userModel->getUser($username)) {
            $_SESSION['error'] = 'El usuario ya existe';
            header('index.php?action=register');
            return;
        }

        // Crear una instancia de CountryController
        $countryController = new CountryController();

        try {
            // Registrar el usuario en la base de datos
            $this->userModel->registerUser($username, $password, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo, $countryController);
            $_SESSION['success'] = 'Usuario registrado exitosamente';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('index.php?action=register');
        }
    }

    public function updateUser($userId, $username, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo, $password = null)
{
    $countryController = new CountryController();


    try {
        $nacimiento = DateTime::createFromFormat('d/m/Y', $nacimiento);
        if ($nacimiento) {
            $nacimiento = $nacimiento->format('Y-m-d');
        }

        // Verificar si el país existe
        $country = $countryController->getCountryByName($pais);
        if (!$country || !isset($country['idPais'])) {
            throw new Exception("País no encontrado: $pais");
        }
        $paisId = $country['idPais'];

        // Hashear la contraseña si es proporcionada
        $hashedPassword = $password ? password_hash($password, PASSWORD_BCRYPT) : null;

        // Actualizar el usuario
        $this->userModel->updateUser(
            $userId,
            $username,
            $email,
            $sexo,
            $nacimiento,
            $ciudad,
            $paisId,
            null,
            'default',
            $hashedPassword,
            $countryController
        );

        $_SESSION['success'] = 'Usuario actualizado exitosamente';
        header('Location: ../index.php?action=viewUser&userId=' . $userId);
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header('Location: index.php?action=myDataResponse');
    }
}

    public function getAlbums($username)
    {
        $albums = $this->userModel->getAlbums($username);
        return $albums;
    }

    public function getUser($username)
    {
        $user = $this->userModel->getUser($username);
        return $user;

    }


    public function getUserName($userId)
    {
        $userName = $this->userModel->getUserName($userId);
        return $userName;
    }

    public function getUserId($username)
    {
        $userId = $this->userModel->getUserId($username);
        return $userId;
    }

    public function getStyle($userId)
    {
        $style = $this->userModel->getStyle($userId);
        return $style;
    }

    public function updateStyle($userId, $style)
    {
        return $this->userModel->updateStyle($userId, $style);
    }   

    public function deleteAccount ($userId){
        $this->userModel->deleteAccount($userId);
    }

    public function closeConection(){
        $this->userModel->closeConection();
    }
}
?>