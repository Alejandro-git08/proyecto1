<?php
require_once 'models/usuario.php';

class logincontroller {

    // Mostrar formulario de login
    public function index() {
        require 'views/login.php';
    }

    // Procesar login
    public function autenticar() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = new usuario();
            $user = $usuario->login($email, $password);

            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];

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

    // Mostrar formulario de registro
    public function registrar() {
        require 'views/registro.php';
    }

    // Procesar registro
    public function crear_usuario() {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'])) {
            $rol = 'cliente'; // por defecto
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasena = $_POST['password'];
            $telefono = $_POST['telefono'] ?? null;

            $usuario = new usuario();
            $usuario->crear($rol, $nombre, $apellido, $email, $contrasena, $telefono);

            // Redirigir al login
            header('Location: index.php?controller=login&action=index');
            exit;
        } else {
            $error = "Complete todos los campos.";
            require 'views/registro.php';
        }
    }
}
