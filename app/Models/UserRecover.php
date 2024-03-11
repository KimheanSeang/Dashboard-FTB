<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecover extends Model
{
    use HasFactory;

    protected $table = 'user_recover'; // Assuming the table name is user_recover

    protected $fillable = [
        'username', 'name', 'email', 'phone', 'address', 'password', 'role', 'status'
    ];
}
