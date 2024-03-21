<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckTask extends Model
{
    use HasFactory;
    protected $table = 'check_task';
    protected $guarded = [];
    protected $fillable = ['title', 'description', 'user_task', 'create_by', 'status', 'process', 'imp'];
}
