<?php 
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../controller/countryController.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($username, $password) {
        $user = $this->userModel->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header('index.php?action=photoGallery');
        } else {
            $_SESSION['error'] = ' Usuario o contraseña incorrectos';
            header('index.php?action=login');
        }
    }

    public function logout() {
        header('index.php?action=logOut');
    }

    public function register($username, $password, $email, $sexo, $nacimiento, $ciudad, $pais, $foto, $estilo) {
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

    public function getAlbums($username) {
        $albums = $this->userModel->getAlbums($username);

        try{
            if (!$albums) {
                throw new Exception("No albums found");
            }
            return $albums;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('index.php?action=photoGallery');
        }
        
    }

    public function getUser($username){
        $user = $this->userModel->getUser($username);

        try{
            if (!$user) {
                throw new Exception("User not found");
            }
            return $user;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('index.php?action=photoGallery');
        }
    }
}
?>
