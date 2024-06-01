<?php


namespace App\Models;

use Core\Orm\Model;

class Worker extends Model
{
    public const WORKER_STATUS_INACTIVE = 0;
    public const WORKER_STATUS_ACTIVE = 1;
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