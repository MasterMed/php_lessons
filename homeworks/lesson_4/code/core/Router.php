<?php

$routeString = trim($_SERVER['REQUEST_URI'], '/');
$route = explode('/', $routeString);
$routeLength = 0;

if(strlen($routeString) > 0) {
    $routeLength = count($route);
    $routeController = ucfirst($route[0]).'.php';
    $routeModel = strtolower($route[0]);    
    if(!file_exists(CONTROLLERS.$routeController)) {
        die("Страницы {$routeController} не существует. 404");
    }    
} else {
    $routeController = 'Main.php';
    $routeModel = 'main';   
}
setModel($routeModel);
include CONTROLLERS.$routeController;

if(isset($route[1])) {
    $routeAction = 'action'.ucfirst($route[1]);
    if(!function_exists($routeAction)) {
        $routeAction = 'actionDetail';
    }
} else {
    $routeAction = 'actionIndex';
}

if(isset($route[2])) {   
    $params = array();
    for($paramCounter = 2; $paramCounter < count($route); $paramCounter++) {
        $params[] = $route[$paramCounter];
    }
}

if(!function_exists($routeAction)) {
    die("Страницы {$routeAction} не существует. 404");
}

$routeAction($params);