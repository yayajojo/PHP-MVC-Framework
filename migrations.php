<?php
require_once __DIR__ . '/vendor/autoload.php';

use mayjhao\phphmvc\Application;


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
$app->db->applyMigrations();


