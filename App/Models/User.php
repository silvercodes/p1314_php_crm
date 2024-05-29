<?php

namespace App\Models;

use Core\Orm\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $fields = [
        'id', 'username', 'email', 'password', 'age', 'token'
    ];
    protected array $fillable = [
        'username', 'email', 'password', 'age', 'token'
    ];

    protected array $required = [
        'username', 'email', 'password'
    ];
}