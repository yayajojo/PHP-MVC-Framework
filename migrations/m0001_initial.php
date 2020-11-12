<?php

namespace app\migrations;

use app\core\Application;

class m0001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = " CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            status BOOLEAN DEFAULT false,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec('DROP TABLE users');
    }
}
