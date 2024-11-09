<?php
// auto loader
require_once("autoloader.php");

// Get the URL path
$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// extract the url and remove the / and convert it to an array
$urlParts = explode('/', $url);

// array index
// returns 0 = mvc 1 = controllerName 2 = actions or methodName

// // Determine controller and action, with default values if not set
$controllerName = (isset($urlParts[1]) && $urlParts[1] !== '') ? $urlParts[1] : 'home';
$method = (isset($urlParts[2]) && $urlParts[2] !== '') ? $urlParts[2] : 'index';


// Build controller class name and file path
$controllerClassName = ucfirst($controllerName) . 'Controller'; // from home to Home
$controllerFile = 'controllers/' . $controllerClassName . '.php'; // file inclusion

// controller redirection
if (file_exists($controllerFile)) {
    require_once("./$controllerFile"); // controllers/HomeController.php
    $controller = new $controllerClassName(); // e.g., new HomeController()

    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Action '$method' not found!";
    }
} else {
    echo "Controller '$controllerClassName' not found!";
}
