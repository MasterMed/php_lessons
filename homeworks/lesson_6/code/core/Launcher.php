<?php

include CORE.'config/db_config.php';

include CORE.'Database.php';
include CORE.'Router.php';

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    define('AJAX', true);
    if(!function_exists($routeAction)) {
        die("Обработчика {$routeAction} не существует. 404");
    }
    echo $routeAction($params);
    exit();
} 
define('AJAX', false);

if(!function_exists($routeAction)) {
    die("Страницы {$routeAction} не существует. 404");
}
$routeAction($params);

include CONTROLLERS.'Menu.php';