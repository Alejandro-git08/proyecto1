<?php
require_once 'models/usuario.php';

class logincontroller {

    // Mostrar formulario de login
    public function index() {

        // Verificar cookie
        if (!isset($_SESSION['id_usuario']) && isset($_COOKIE['usuario_logueado'])) {
            $usuario = new usuario();
            $user = $usuario->getById($_COOKIE['usuario_logueado']); // Método que ya definimos en el modelo

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

            $usuario = new usuario();
            $user = $usuario->login($email, $password);

            if ($user) {
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];

                // Crear cookie para mantener sesión (30 días)
                if (isset($_POST['recordarme'])) {
                    setcookie('usuario_logueado', $user['id_usuario'], time() + (30*24*60*60), "/"); // 30 días
                }

                // Redirigir siempre a home index; el homecontroller decidirá la vista
                header('Location: index.php?controller=home&action=index');
                exit;
            } else {
                $error = "Email o contraseña incorrectos.";
                require 'views/login.php';
            }
        } else {
            // Si no hay email o password, redirigir a login
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

    public function logout(){
        session_start();   // Asegúrate de iniciar sesión
        session_unset();   // Limpia variables de sesión
        session_destroy(); // Destruye la sesión

        // Borrar cookie de recordarme si existe
        if(isset($_COOKIE['usuario_logueado'])) {
            setcookie('usuario_logueado', '', time() - 3600, "/");
        }

        // Redirigir al login
        header("Location: index.php?controller=login&action=index");
        exit;
    }
}

/*

Para más seguridad se podria hashear la contraseña, pero hay que cambiar el procedimiento en la BD 
No se porque no se puede cerrar sesión (arreglado)

*/
