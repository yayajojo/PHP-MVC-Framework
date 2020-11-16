<?php
require_once __DIR__ . '/../vendor/autoload.php';

use mayjhao\phphmvc\Application;
use app\controllers\ProfileController;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\models\User;

ini_set('session.save_path',dirname(__DIR__).'/sessions');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass'=>User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$path = dirname(__DIR__);
$app = new Application($path, $config);
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/profile', [ProfileController::class, 'create']);
$app->router->post('/contact', [SiteContactController::class, 'handleContact']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/logout', [AuthController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->run();
