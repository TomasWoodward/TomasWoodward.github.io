<?php 
require_once __DIR__ . '/../model/UserModel.php';

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
}