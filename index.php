<?php
session_start();

// Conexión a la base de datos con PDO
try {
    $conexion = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Definir controlador y acción por defecto
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Archivo del controlador
$controllerFile = "controllers/" . strtolower($controller) . "controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Clase del controlador (minúscula)
    $controllerClass = strtolower($controller) . "controller";

    if (class_exists($controllerClass)) {
        // PASAMOS la conexión PDO al controlador
        $controllerInstance = new $controllerClass($conexion);

        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            echo "Error: La acción '$action' no existe en '$controllerClass'.";
        }
    } else {
        echo "Error: La clase '$controllerClass' no existe.";
    }
} else {
    echo "Error: El archivo del controlador '$controllerFile' no existe.";
}


/*

Tener cuidado con los nombres de archivos, solo en minuscula. 
Se puede mejorar la seguridad con un arreglo de controladores permtidos, pero no de momento.
Se puede mejorar los mensajes de error. 

*/




