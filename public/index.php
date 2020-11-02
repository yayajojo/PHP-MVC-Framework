<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteContactController;
use app\controllers\HomeController;
use app\controllers\AuthController;



$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$path = dirname(__DIR__);
$app = new Application($path, $config);
$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/contact', [SiteContactController::class, 'create']);
$app->router->post('/contact', [SiteContactController::class, 'handleContact']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->run();
