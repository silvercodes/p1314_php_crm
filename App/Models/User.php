<?php

namespace App\Models;

use Core\Orm\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $fields = [
        'id', 'email', 'pass'
    ];
}