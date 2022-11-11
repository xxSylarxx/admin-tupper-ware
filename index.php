<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST");
header("Allow: GET, POST");

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/Config.php';
require_once __DIR__ . '/core/Database.php';

use Admin\Core\Funciones;
use Admin\Models\EmpresaModel;

// echo Funciones::generarPass('admin'); exit(1);
define('EMPRESA', EmpresaModel::obtenerNombre());

$URI = isset($_GET['uri']) ? $_GET['uri'] : 'index';
$URI = rtrim($URI, '/');
$URI = explode('/', $URI);

spl_autoload_register(function ($class) {
    $fileModel = PATH_ROOT . "/models/{$class}.php";
    if (file_exists($fileModel)) {
        require_once $fileModel;
    }
});

if ($URI[0] == 'admin') {
    $controller = isset($URI[1]) ? $URI[1] : 'login';
    $controller = ucfirst($controller);
    $fileController = __DIR__ . "/controller/{$controller}.php";
    if (file_exists($fileController)) {
        require_once $fileController;
        $controller = new $controller;
        $method = isset($URI[2]) ? $URI[2] : 'index';
        $params = null;
        if (method_exists($controller, $method) || method_exists($controller, '__call')) {
            if (isset($URI[3])) {
                $params = array();
                for ($i = 3; $i < count($URI); $i++) :
                    $params[] = $URI[$i];
                endfor;
            }
            $controller->{$method}($params);
        } else {
            include_once __DIR__ . "/views/admin/404.php";
        }
    } else {
        include_once __DIR__ . "/views/admin/404.php";
    }
} else {
    $fileView = __DIR__ . "/views/web/{$URI[0]}.php";
    if (file_exists($fileView)) {
        include_once $fileView;
    } else {
        include_once __DIR__ . "/views/web/404.php";
    }
}
