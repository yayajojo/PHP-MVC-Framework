<?php

namespace app\core;

use PDO;


class Database
{
    protected $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function applyMigrations()
    { 
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration == '.' || $migration == '..') {
                continue;
            }
            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $className = 'app\migrations\\'. $className;
            $instance = new $className();
            echo 'applying migration'. PHP_EOL;
            $instance->up();
            echo 'applied migration'. PHP_EOL;
        }
        
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=InnoDB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("
        SELECT migration FROM migrations;
        ");
        $statement->execute();
        $files = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $files;
    }
}
