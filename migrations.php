<?php
require_once __DIR__.'/vendor/autoload.php';
use app\core\Application;






$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$path = __DIR__;
$app = new Application($path, $config);
var_dump($app1);

$app->db->applyMigrations();

