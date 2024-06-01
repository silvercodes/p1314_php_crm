<?php

namespace Core\Orm;

use Core\DB;
use Exception;
use PDOStatement;

abstract class Model
{
    protected string $table;
    protected string $identity = 'id';
    protected array $fields = [];
    protected array $fillable = [];
    protected array $required = [];
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
    private function insertRow(): void
    {
        $keys = array_intersect(array_keys($this->data), $this->fillable);

        // $keys = array_filter(array_keys($this->data), fn($k) => in_array($k, $this->fillable));

        foreach ($this->required as $item)
            if (! in_array($item, $keys))
                throw new Exception("field $item is required"); // TODO: custom exception

        $sqlNames = implode(', ', $keys);

        $placeholders = array_map(fn($k) => ':' . $k , $keys);
        $sqlValues = implode(', ', $placeholders);

        $sql = "INSERT INTO $this->table ($sqlNames) VALUES ($sqlValues);";

        DB::run($sql, array_intersect_key($this->data, array_flip($keys)));
    }
    private function updateRow(): void
    {
        $data = array_intersect_key($this->data, array_flip($this->fillable));

        $setters = array_map(fn($k) => "$k = :$k", array_keys($data));

        $sql = "UPDATE $this->table SET "
                . implode(', ', $setters)
                . " WHERE $this->identity = "
                . $this->data[$this->identity] . ';';

        DB::run($sql, $data);
    }


    public function __get(string $property): mixed
    {
        if (array_key_exists($property, $this->data))
            return $this->data[$property];

        return null;
    }
    public function __set(string $property, $value): void
    {
        $this->data[$property] = $value;
    }


    public function save()
    {
        $this->insertRow($this->data);
    }
    public function update()
    {
        $this->updateRow();
    }


    public static function findOne(array $conditions): ?Model {
        $modelClass = get_called_class();
        $model = new $modelClass();

        $model->data = $model->getBy($conditions)->fetch() ?: [];

        if ($model->data)
            return $model;

        return null;
    }
    public static function create(array $data): Model
    {
        $modelClass = get_called_class();
        $model = new $modelClass();

        foreach ($model->fillable as $property)
            if (array_key_exists($property, $data))
                $model->data[$property] = $data[$property];

        return $model;
    }
    public static function all(): array
    {
        $modelClass = get_called_class();
        $model = new $modelClass();

        $dataArray = $model->getBy()->fetchAll();

        return array_map(function($data) use($modelClass) {
            $m = new $modelClass;

            foreach ($m->fields as $property) {
                if (array_key_exists($property, $data))
                    $m->data[$property] = $data[$property];
                else
                    $m->data[$property] = null;
            }

            return $m;
        }, $dataArray);
    }
}
