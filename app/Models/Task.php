<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'todo_task';
    protected $guarded = [];
    protected $fillable = ['title', 'description', 'user_task', 'create_by', 'approved_by', 'approved_at', 'created_date','status', 'process', 'imp'];
}