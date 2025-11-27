<?php
require_once 'models/usuario.php';

class logincontroller {

    private $usuarioModel;

    public function __construct($conexion) {
        $this->usuarioModel = new Usuario($conexion);
    }

    public function index() {

        // Verificar cookie
        if (!isset($_SESSION['id_usuario']) && isset($_COOKIE['usuario_logueado'])) {
            
            $user = $this->usuarioModel->getById($_COOKIE['usuario_logueado']);

            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];
                if($user['rol'] === 'admin') {
                    header('Location: index.php?controller=home&action=admin');
                } else {
                    header('Location: index.php?controller=home&action=index');
                }
                exit;
            }
        }

        require 'views/login.php';
    }

    // Procesar login
    public function autenticar() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->usuarioModel->login($email, $password);

            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];

                if (isset($_POST['recordarme'])) {
                    setcookie('usuario_logueado', $user['id_usuario'], time() + (30*24*60*60), "/"); // 30 días
                }

                header('Location: index.php?controller=home&action=index');
                exit;
            } else {
                $error = "Email o contraseña incorrectos.";
                require 'views/login.php';
            }
        } else {

            header('Location: index.php?controller=login&action=index');
            exit;
        }
    }

   
    public function registrar() {
        require 'views/registro.php';
    }

    public function crear_usuario() {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'])) {
            $rol = 'cliente'; // por defecto
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasena = $_POST['password'];
            $telefono = $_POST['telefono'] ?? null;

            $this->usuarioModel->crear($rol, $nombre, $apellido, $email, $contrasena, $telefono);

            header('Location: index.php?controller=login&action=index');
            exit;
        } else {
            $error = "Complete todos los campos.";
            require 'views/registro.php';
        }
    }

    public function logout(){
        session_start();   
        session_unset();   
        session_destroy(); 

        if(isset($_COOKIE['usuario_logueado'])) {
            setcookie('usuario_logueado', '', time() - 3600, "/");
        }

        header("Location: index.php?controller=login&action=index");
        exit;
    }
}

/*

Para más seguridad se podria hashear la contraseña, pero hay que cambiar el procedimiento en la BD 
No se porque no se puede cerrar sesión (arreglado)

*/
