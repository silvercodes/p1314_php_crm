<?php


namespace App\Models;

use Core\Orm\Model;

class Worker extends Model
{
    protected string $table = 'workers';
    protected array $fields = [
        'id', 'first_name', 'last_name', 'phone', 'status', 'salary',
    ];
    protected array $fillable = [
        'first_name', 'last_name', 'phone', 'status', 'salary',
    ];

    protected array $required = [
        'first_name', 'last_name',
    ];
}