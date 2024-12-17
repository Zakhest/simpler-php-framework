<?php

require_once __DIR__ . '/Core/Controller.php';
require_once __DIR__ . '/Core/Model.php';
require_once __DIR__ . '/Core/Database.php';
require_once __DIR__ . '/Core/ErrorHandler.php';

// Konfigurasi debugging (aktifkan untuk pengembangan)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Parsing URL
$request = trim($_SERVER['REQUEST_URI'], '/');
$script_name = trim(dirname($_SERVER['SCRIPT_NAME']), '/');
$request = preg_replace('/^' . preg_quote($script_name, '/') . '/', '', $request, 1);
$request = trim($request, '/');

// Default controller dan method
if (empty($request)) {
    $controller = 'Home';
    $method = 'index';
    $parameters = [];
} else {
    $segments = explode('/', $request);
    $controller = $segments[0] ?? 'Home'; // Default ke "Home"
    $method = $segments[1] ?? 'index';   // Default ke "index"
    $parameters = array_slice($segments, 2);
}

// Path file controller
$controllerPath = __DIR__ . "/app/controllers/{$controller}.php";

if (!file_exists($controllerPath)) {
    ErrorHandler::handle("Controller tidak ada: <b>$controller</b>");
}

require_once $controllerPath;

if (!class_exists($controller)) {
    ErrorHandler::handle("Controller class tidak ditemukan: <b>$controller</b>");
}

// Inisialisasi controller
$controllerInstance = new $controller();

// Cek apakah method ada
if (!method_exists($controllerInstance, $method)) {
    ErrorHandler::handle("Function tidak ditemukan: <b>$method</b> pada controller <b>$controller</b>");
}

// Eksekusi method dengan parameter
call_user_func_array([$controllerInstance, $method], $parameters);

// Cek dan tampilkan view
function loadView($viewName, $data = [])
{
    // Path untuk file view yang diinginkan
    $viewFile = __DIR__ . "/app/views/{$viewName}.php";
    
    if (file_exists($viewFile)) {
        extract($data);
        require_once $viewFile;
    } else {
        // Error handler yang menunjukkan view tidak ditemukan
        ErrorHandler::handle("View yang dipanggil tidak ada atau belum dibuat: view/<b>{$viewName}.php</b>");
    }
}