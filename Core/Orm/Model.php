<?php

namespace Core\Orm;

use Core\DB;
use PDOStatement;

abstract class Model
{
    protected string $table;
    protected string $identity = 'id';
    protected array $fields = [];
    protected array $data = [];


    private function getBy(array $args = []): PDOStatement
    {
        $sql = "SELECT * FROM $this->table";

        if ($args) {
            $conditions = array_map(fn($k) => "$k=:$k", array_keys($args));

            $sql .= " WHERE " . implode(' AND ', $conditions) . ';';
        } else {
            $sql .= ';';
        }

        return DB::run($sql, $args);
    }


    public static function findOne(array $conditions): ?Model {
        $modelClass = get_called_class();
        $model = new $modelClass();

        $model->data = $model->getBy($conditions)->fetch() ?: [];

        if ($model->data)
            return $model;

        return null;
    }






}