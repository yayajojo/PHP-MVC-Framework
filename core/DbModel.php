<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName();

    abstract public function attributes();

    public function save()
    {
        $statement = $this->prepare();
        foreach($this->attributes() as $attr){
            $statement->bindValue(':'.$attr, $this->{$attr});
        }
        if($statement->execute()){
            return true;
        }else{
            return false;
        };
        
        
    }

    public function prepare()
    {
        $params = array_map(function ($attr) {
            return ':' . $attr;
        }, $this->attributes());
        $sql = "INSERT INTO ". $this->tableName()."(" . implode(',', $this->attributes()) . ")VALUES(" . implode(',', $params).")";
        return Application::$app->db->pdo->prepare($sql);
    }
}
