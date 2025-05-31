<?php



require_once __DIR__ .'/../../vendor/autoload.php';
const STORAGE_PATH = __DIR__ . '/../storage';
const VUE_PATH = __DIR__ . '/../vues';

use App\Controller;
use App\Exceptions\RouteNotFoundException;
use App\HomeController;
use App\LoginController;

$router=new Controller();
try {
    $router->get('/', [HomeController::class, 'index'])
    ->get('/login', [LoginController::class, 'index'])
    ->post('/upload', [LoginController::class, 'upload']);

    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
}catch (RouteNotFoundException $e){
    echo $e->getMessage();
}


