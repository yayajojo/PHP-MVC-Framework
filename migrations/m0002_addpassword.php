<?php

namespace app\migrations;

use mayjhao\phphmvc\Application;

class m0002_addpassword
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE users
        ADD password varchar(255) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec('DROP TABLE users');
    }
}