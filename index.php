<?php
session_start();

// Definir controlador y acción por defecto
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Archivo del controlador
$controllerFile = "controllers/" . strtolower($controller) . "controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerClass = strtolower($controller) . "controller"; // Nombre en minúscula

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

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




