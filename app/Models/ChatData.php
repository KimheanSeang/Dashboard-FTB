<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatData extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_description', 'description'];
}
