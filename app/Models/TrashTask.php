<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashTask extends Model
{
    use HasFactory;
    protected $table = 'trash_task';
    protected $guarded = [];
    protected $fillable = ['title', 'description', 'user_task', 'status', 'process', 'imp'];
}
