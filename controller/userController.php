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
            return $this->userModel->registerUser($username, $password, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo, $countryController);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('index.php?action=register');
        }
    }

    public function updateUser($userId, $username, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $password = null)
    {
        // Hashear la contraseña si es proporcionada
        $hashedPassword = $password ? password_hash($password, PASSWORD_BCRYPT) : null;

        // Actualizar el usuario
        return $this->userModel->updateUser(
            $userId,
            $username,
            $email,
            $sexo,
            $nacimiento,
            $ciudad,
            $foto,
            $pais,
            $hashedPassword,
        );
    }

    public function getUserPhoto($username){
        $photo = $this->userModel->getUserPhoto($username);
        return $photo;
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

    public function deleteAccount($userId)
    {
        $this->userModel->deleteAccount($userId);
    }

    public function closeConection()
    {
        $this->userModel->closeConection();
    }
}
?>