<?php

// include "./config/Database.php";

// $db = new Database;
// $valida =$db->connect();

// if($valida){
//     echo "Conexão realizada !";
// } else {
//     echo "Falha na conexão!";
// }

//manejo de errores 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//cargar el archivo de configuracion 
require_once 'config/config.php';

//autoad de clases

spl_autoload_register(function ($class_name) {
    $directories = [
        'controllers/',
        'models/',
        'config/',
        'utils/',
        ''
    ];
    
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            // var_dump($file);
            require_once $file;
            return;
        }
    }
});


// crear una instancia de la clase Router

$router = new Router();

// agregar rutas

$public_routes =[
    '/web'
];

//obtener la ruta actual 

    $current_Route = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $current_Route = str_replace(dirname($_SERVER['SCRIPT_NAME']),'',$current_Route);
    //$current_route = me devuelbe la ruta de la carpeta del proyecto 
    // echo $current_Route;
    // var_dump($current_Route);
    // die($current_Route);

    $router->add('GET','/web','webController','index');


// Despachar la ruta 

try {
    $router->dispatch($current_Route, $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    // Manejar el error
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include 'views/errors/404.php';
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
}

