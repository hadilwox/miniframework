<?php

namespace App\Models\Contracts;

abstract class BaseModel implements CrudInterface
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    protected $pageSize = 10;
    protected $attributes = [];



    public function getAttribute($key)
    {
        if (!$key || !array_key_exists($key, $this->attributes)) {
            return null;
        }
        return $this->attributes[$key];
    }

    public function getAllAttributes()
    {
        return $this->attributes;
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public function __set($key, $value)
    {
        if (!$key || !array_key_exists($key, $this->attributes)) {
            return null;
        }
        $this->attributes[$key] = $value;
    }

}