<?php



require_once __DIR__ .'/../../vendor/autoload.php';
const STORAGE_PATH = __DIR__ . '/../storage';
const VUE_PATH = __DIR__ . '/../vues';

use App\Controller;
use App\Exceptions\RouteNotFoundException;
use App\HomeController;
use App\LoginController;
use App\Vue;

$router=new Controller();
try {
    $router->get('/', [HomeController::class, 'index'])
    ->get('/login', [LoginController::class, 'index'])
    ->post('/upload', [LoginController::class, 'upload'])
    ->get('/download', [LoginController::class, 'download']);

    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
}catch (RouteNotFoundException $e){
    http_response_code(404);
    echo Vue::make('error/404');
}


